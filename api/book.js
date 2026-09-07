export default function handler(req, res) {
    // Handle CORS preflight
    if (req.method === 'OPTIONS') {
        res.setHeader('Access-Control-Allow-Origin', '*');
        res.setHeader('Access-Control-Allow-Methods', 'POST, OPTIONS');
        res.setHeader('Access-Control-Allow-Headers', 'Content-Type, X-Requested-With, Accept');
        return res.status(200).end();
    }

    if (req.method !== 'POST') {
        return res.status(405).json({
            success: false,
            message: 'Method Not Allowed'
        });
    }

    // Parse body parameters
    let body = req.body;
    if (typeof body === 'string') {
        try {
            body = JSON.parse(body);
        } catch {
            body = {};
        }
    }

    const {
        customer_name,
        customer_phone,
        customer_email,
        vehicle_type,
        vehicle_model,
        service_package,
        preferred_date,
        preferred_time,
        special_notes,
    } = body || {};

    if (!customer_name || !customer_phone || !vehicle_type || !service_package || !preferred_date || !preferred_time) {
        return res.status(422).json({
            success: false,
            message: 'Please complete all required fields.',
        });
    }

    const refSuffix = Math.random().toString(36).substring(2, 8).toUpperCase();
    const referenceCode = `APX-${refSuffix}`;

    const vehicleLabels = {
        sedan: 'Coupe / Sedan',
        crossover: 'Compact SUV / Crossover',
        fullsuv: 'Full SUV / Minivan',
        truck: 'Truck / Large 4x4',
        exotic: 'Exotic / Supercar',
    };

    const vehicleLabel = vehicleLabels[vehicle_type] || vehicle_type;
    
    // Format human-readable date
    let formattedDate = preferred_date;
    try {
        const d = new Date(preferred_date + 'T00:00:00');
        if (!isNaN(d.getTime())) {
            formattedDate = d.toLocaleDateString('en-US', {
                weekday: 'long',
                year: 'numeric',
                month: 'long',
                day: 'numeric'
            });
        }
    } catch {
        formattedDate = preferred_date;
    }

    const bookingData = {
        reference: referenceCode,
        name: customer_name,
        phone: customer_phone,
        email: customer_email || 'Not provided',
        vehicle_type: vehicleLabel,
        vehicle_model: vehicle_model || 'Vehicle not specified',
        package: service_package,
        date: formattedDate,
        time: preferred_time,
        notes: special_notes || 'None',
        created_at: new Date().toLocaleDateString('en-US', {
            month: 'short',
            day: 'numeric',
            year: 'numeric'
        }) + ' - ' + new Date().toLocaleTimeString('en-US', {
            hour: 'numeric',
            minute: '2-digit'
        }),
    };

    // Format WhatsApp confirmation URL
    const waMessage = encodeURIComponent(
        `Hello Apex Auto Spa! I just booked an appointment.\n` +
        `Ref: ${referenceCode}\n` +
        `Name: ${bookingData.name}\n` +
        `Vehicle: ${bookingData.vehicle_type} (${bookingData.vehicle_model})\n` +
        `Package: ${bookingData.package}\n` +
        `Preferred: ${bookingData.date} at ${bookingData.time}`
    );
    bookingData.whatsapp_url = `https://wa.me/18005550199?text=${waMessage}`;

    return res.status(200).json({
        success: true,
        message: 'Appointment request submitted successfully!',
        booking: bookingData,
    });
}

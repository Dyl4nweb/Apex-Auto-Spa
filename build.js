import fs from 'fs';
import path from 'path';
import { fileURLToPath } from 'url';

const __filename = fileURLToPath(import.meta.url);
const __dirname = path.dirname(__filename);

console.log('🚀 Starting Apex Auto Spa Vercel build...');

const distDir = path.join(__dirname, 'dist');
const publicDir = path.join(__dirname, 'public');

if (!fs.existsSync(distDir)) {
    fs.mkdirSync(distDir, { recursive: true });
}

function copyDirRecursive(src, dest) {
    if (!fs.existsSync(src)) return;
    if (!fs.existsSync(dest)) fs.mkdirSync(dest, { recursive: true });
    
    const entries = fs.readdirSync(src, { withFileTypes: true });
    for (const entry of entries) {
        const srcPath = path.join(src, entry.name);
        const destPath = path.join(dest, entry.name);
        
        if (entry.isDirectory()) {
            copyDirRecursive(srcPath, destPath);
        } else {
            fs.copyFileSync(srcPath, destPath);
        }
    }
}

// Copy public assets to dist
copyDirRecursive(path.join(publicDir, 'css'), path.join(distDir, 'css'));
copyDirRecursive(path.join(publicDir, 'js'), path.join(distDir, 'js'));
copyDirRecursive(path.join(publicDir, 'images'), path.join(distDir, 'images'));

const staticFiles = ['favicon.svg', 'favicon.ico', 'robots.txt'];
for (const file of staticFiles) {
    const src = path.join(publicDir, file);
    const dest = path.join(distDir, file);
    if (fs.existsSync(src)) {
        fs.copyFileSync(src, dest);
    }
}

// Verify index.html
const indexHtml = path.join(distDir, 'index.html');
if (fs.existsSync(indexHtml)) {
    const stats = fs.statSync(indexHtml);
    console.log(`✅ dist/index.html ready (${stats.size} bytes).`);
} else {
    console.error('❌ Error: dist/index.html not found! Please run `npm run export` locally.');
    process.exit(1);
}

console.log('✨ Build completed successfully for Vercel deployment!');

#!/bin/bash
cd /home1/smtgflte/www/website_ae6496d0 || exit 1

echo "[DEPLOY] $(date): Running git pull" >> deploy.log

# Optionally reset to ensure clean state
git reset --hard HEAD >> deploy.log 2>&1
git pull origin main >> deploy.log 2>&1

# Optional: clear Grav cache after update
bin/grav clear-cache >> deploy.log 2>&1

echo "[DEPLOY] Done." >> deploy.log

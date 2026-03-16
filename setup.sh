#!/bin/bash
# Automated setup for Node.js using nvm
set -e

# Install nvm if not present
if ! command -v nvm &> /dev/null; then
  echo "Installing nvm..."
  curl -o- https://raw.githubusercontent.com/nvm-sh/nvm/v0.39.7/install.sh | bash
  export NVM_DIR="$HOME/.nvm"
  [ -s "$NVM_DIR/nvm.sh" ] && \. "$NVM_DIR/nvm.sh"
else
  echo "nvm already installed."
fi

# Ensure nvm is loaded for this script
export NVM_DIR="$HOME/.nvm"
[ -s "$NVM_DIR/nvm.sh" ] && \. "$NVM_DIR/nvm.sh"

# Install latest LTS Node.js
nvm install --lts
nvm use --lts

# Print versions
node -v
npm -v

echo "Node.js and npm are set up using nvm!"

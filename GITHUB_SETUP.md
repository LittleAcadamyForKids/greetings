# GitHub Authentication Setup

## Current Issue
You're getting a 401 authentication error because GitHub no longer accepts passwords for HTTPS authentication.

## Solution: Use Personal Access Token (PAT)

### Step 1: Create a Personal Access Token
1. Go to: https://github.com/settings/tokens
2. Click "Generate new token" → "Generate new token (classic)"
3. Give it a name: "Cursor Development"
4. Select scopes: Check **`repo`** (Full control of private repositories)
5. Click "Generate token"
6. **COPY THE TOKEN** - You won't see it again!

### Step 2: Use the Token
When you push, Git will ask for:
- **Username**: Your GitHub username
- **Password**: Paste your Personal Access Token (NOT your GitHub password)

### Step 3: Push Your Code
```bash
git push -u origin master
```

When prompted:
- Username: `your-github-username`
- Password: `paste-your-token-here`

The credentials will be saved for future use.

---

## Alternative: Switch to SSH (More Secure)

If you prefer SSH authentication:

### Step 1: Generate SSH Key
```bash
ssh-keygen -t ed25519 -C "your.email@example.com"
```
(Press Enter to accept default location, optionally set a passphrase)

### Step 2: Add SSH Key to GitHub
```bash
cat ~/.ssh/id_ed25519.pub
```
Copy the output, then:
1. Go to: https://github.com/settings/keys
2. Click "New SSH key"
3. Paste your public key
4. Click "Add SSH key"

### Step 3: Change Remote to SSH
```bash
git remote set-url origin git@github.com:LittleAcadamyForKids/greetings.git
```

### Step 4: Test Connection
```bash
ssh -T git@github.com
```

### Step 5: Push
```bash
git push -u origin master
```

---

## Verify Your Setup

After setting up authentication, verify:
```bash
git remote -v
git push -u origin master
```


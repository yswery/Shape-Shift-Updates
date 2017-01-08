# Shape-Shift-Updates
Email alerts for ShapeShift Bitcoin and Ether exchange rate changes

---

# Installation
You must have composer already set up on your environment - [Installing Composer](https://getcomposer.org/doc/00-intro.md)

```
composer install
cp -f .env.example .env
```

Now you will need to edit your .env with your GMail SMTP credentials and recieving EMAIL address.

---

# Changelog 

### _Version 0.2_
- Make use og dotenv environment system
- Clean up the vendor and other gitignore files

### _Version 0.1_
- Initial commit 
- BTC/ETH exchange data from ShapeShift API
- BTC/ETH fiat currency rates from Coinbase API
- Email info to recipient
 



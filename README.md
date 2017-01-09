# Bitcoin and Ether Email Updates
Email alerts for ShapeShift Bitcoin and Ether exchange rate changes

# Installation
You must have composer already set up on your environment - [Installing Composer](https://getcomposer.org/doc/00-intro.md)

```
composer install
cp -f .env.example .env
```

Now you will need to edit your .env with your GMail SMTP credentials and recieving EMAIL address.



# Use
To use, simply call the below from the command line 
```
php Run.php
```

---

# Changelog 


### _Version 0.2_
- Add sell price to email
- Add NZD prices to email
- Split classes up
- Formatted email layout
- Refactored code
- Make use of dotenv environment system
- Add BTC pricing from CoinCap.io (used by Shapeshift)

### _Version 0.1_
- Initial commit 
- BTC/ETH exchange data from ShapeShift API
- BTC/ETH fiat currency rates from Coinbase API
- Email info to recipient
 



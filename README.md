<h1 align="center">
  Website Skeleton
  <br>
  <a href="https://github.com/Machy8/website-skeleton/blob/master/LICENSE">
    <img src="https://img.shields.io/github/license/Machy8/website-skeleton.svg?style=flat">
  </a>
  <a href="https://packagist.org/packages/machy8/website-skeleton">
    <img src="https://img.shields.io/packagist/dt/Machy8/website-skeleton.svg?style=flat">
  </a>
</h1>
🚀 Symfony/skeleton prepared for web development.


**Contains**
- Prepared structure
- Prepared commands in composer and package.json
- Custom error controller
- Installed [frontend](https://github.com/Machy8/website-skeleton/blob/master/package.json) and [backend](https://github.com/Machy8/website-skeleton/blob/master/composer.json) packages one usually need for web development

## Installation

1. Install packages and project
```
composer create-project machy8/website-skeleton web
yarn install
```

2. Generate bundles
```
yarn dev
```

### If you use Docker
1. Clone project
```
git clone git@github.com:Machy8/website-skeleton.git myproject 
```

2. Build the server image and start the server container
```
docker-compose build
docker-compose up
```

3. Install packages
```
docker-compose exec server composer install
docker-compose exec server yarn install
```

4. Generate bundles
```
docker-compose exec server yarn dev
```

5. Visit [http://localhost:85](http://localhost:85)

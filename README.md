<!--
*** Thanks for checking out this README Template. If you have a suggestion that would
*** make this better, please fork the repo and create a pull request or simply open
*** an issue with the tag "enhancement".
*** Thanks again! Now go create something AMAZING! :D
-->

<!-- PROJECT SHIELDS -->
<!--
*** I'm using markdown "reference style" links for readability.
*** Reference links are enclosed in brackets [ ] instead of parentheses ( ).
*** See the bottom of this document for the declaration of the reference variables
*** for contributors-url, forks-url, etc. This is an optional, concise syntax you may use.
*** https://www.markdownguide.org/basic-syntax/#reference-style-links
-->

[![Contributors][contributors-shield]][contributors-url]
[![Forks][forks-shield]][forks-url]
[![Stargazers][stars-shield]][stars-url]
[![Issues][issues-shield]][issues-url]
[![License: MIT][license-shield]][license-url]
[![LinkedIn][linkedin-shield]][linkedin-url]

<!-- PROJECT LOGO -->
<br />
<p align="center">
  <a href="https://github.com/menyagah/Telegram_Bot">
    <img src="https://user-images.githubusercontent.com/24241962/103855601-14efbd00-50c4-11eb-862c-05691381dccc.png" alt="Logo" width="170" height="170">
  </a>

  <h3 align="center">Telegram Bot</h3>

  <p align="center">
    A telegram bot that sells phones to users.
    <br />
    <a href="https://github.com/menyagah/Telegram_Bot/tree/feature"><strong>Explore the docs »</strong></a>
    <br />
    <br />
    <a href="https://github.com/menyagah/Telegram_Bot/issues">Report Bug</a>
    ·
    <a href="https://github.com/menyagah/Telegram_Bot/issues">Request Feature</a>
  </p>
</p>

<!-- TABLE OF CONTENTS -->

## Table of Contents

- [About the Project](#about-the-project)
  - [Built With](#built-with)
- [Getting Started](#getting-started)
  - [Prerequisites](#prerequisites)
  - [Installation](#installation)
- [Usage](#usage)
- [Roadmap](#roadmap)
- [Contributing](#contributing)
- [License](#license)
- [Contact](#contact)
- [Acknowledgements](#acknowledgements)

<!-- ABOUT THE PROJECT -->

## About The Project

![image](https://user-images.githubusercontent.com/24241962/103855134-0b198a00-50c3-11eb-9be4-ea26a668b32d.png)

This is a php api backend that stores data, retrieves data and deletes it upon user requests. Data is store in a mysql database.

### Built With

- PHP
- MYSQL
- COMPOSER

<!-- GETTING STARTED -->

## Getting Started

To get a local copy up and running follow these simple steps.

### Prerequisites

- PHP
- MYSQL
- APACHE SERVER
- POSTMAN

### Installation

1.  Clone the repo

    ```sh
    git@github.com:menyagah/scandiweb-products.git
    ```

2.  Have all the prerequisites installed

    We need to have all the prerequisites mentioned above installed. Start your apache and Mysql server.

3.  Set-up .env file

    - Create a .env file in your root project.
    - You need to set up your parameters as shown in .env.example.
    - You can leave the DB_DSN as shown below. The rest you have to change to the params you set-up on mysql installation.

    ```sh
      DB_DSN = mysql:host=localhost;port=3306;dbname=scandiweb_test
      DB_USER = root
      DB_PASSWORD = root
    ```

4.  In your terminal, cd into the project folder and run the following command to generate the database fields

    ```sh
    php migrations.php
    ```

5.  Start local server

    ```sh
        php -S localhost:8080 -t public
    ```

    ```
    <!-- USAGE EXAMPLES -->
    ```

## Usage

Start postman and do a get request using

    ```sh
    http://localhost:8080/products
    ```

    - post request

        ```sh

    http://localhost:8080/add-product

<!-- ROADMAP -->

## Roadmap

See the [open issues](https://github.com/menyagah/scandiweb-products/issues) for a list of proposed features (and known issues).

<!-- CONTRIBUTING -->

## Contributing

Contributions are what make the open source community such an amazing place to be learn, inspire, and create. Any contributions you make are **greatly appreciated**.

1. Fork the Project
2. Create your Feature Branch (`git checkout -b feature/AmazingFeature`)
3. Commit your Changes (`git commit -m 'Add some AmazingFeature'`)
4. Push to the Branch (`git push origin feature/AmazingFeature`)
5. Open a Pull Request

<!-- LICENSE -->

## License

Distributed under the MIT License. See `LICENSE` for more information.

<!-- CONTACT -->

## Contact

Martin Nyagah - [@Martinnyaga20](https://twitter.com/Martinnyaga20) - menyagah27@gmail.com

<!-- ACKNOWLEDGEMENTS -->

## Acknowledgements

- [TelegramBotAPI](https://core.telegram.org/bots/api)
- README Icon made by <a href="http://www.freepik.com/" title="Freepik">Freepik</a> from <a href="https://www.flaticon.com/" title="Flaticon"> www.flaticon.com</a>

<!-- MARKDOWN LINKS & IMAGES -->
<!-- https://www.markdownguide.org/basic-syntax/#reference-style-links -->

[contributors-shield]: https://img.shields.io/github/contributors/tirthajyoti-ghosh/weather-app.svg?style=flat-square
[contributors-url]: https://github.com/menyagah/Telegram_Bot/graphs/contributors
[forks-shield]: https://img.shields.io/github/forks/menyagah/Telegram_Bot.svg?style=flat-square
[forks-url]: https://github.com/menyagah/Telegram_Bot/network/members
[stars-shield]: https://img.shields.io/github/stars/menyagah/Telegram_Bot.svg?style=flat-square
[stars-url]: https://github.com/menyagah/Telegram_Bot/stargazers
[issues-shield]: https://img.shields.io/github/issues/menyagah/Telegram_Bot.svg?style=flat-square
[issues-url]: https://github.com/menyagah/Telegram_Bot/issues
[license-shield]: https://img.shields.io/badge/License-MIT-yellow.svg
[license-url]: https://github.com/menyagah/Telegram_Bot/blob/development/LICENSE
[linkedin-shield]: https://img.shields.io/badge/-LinkedIn-black.svg?style=flat-square&logo=linkedin&colorB=555
[linkedin-url]: https://www.linkedin.com/in/martin-nyagah-a29b8610b/

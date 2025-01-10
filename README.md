[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/sakg23/mvc-24/badges/quality-score.png?b=main)](https://scrutinizer-ci.com/g/sakg23/mvc-24/?branch=main)
[![Code Coverage](https://scrutinizer-ci.com/g/sakg23/mvc-24/badges/coverage.png?b=main)](https://scrutinizer-ci.com/g/sakg23/mvc-24/?branch=main)
[![Build Status](https://scrutinizer-ci.com/g/sakg23/mvc-24/badges/build.png?b=main)](https://scrutinizer-ci.com/g/sakg23/mvc-24/?branch=main)
[![Code Intelligence Status](https://scrutinizer-ci.com/g/sakg23/mvc-24/badges/code-intelligence.svg?b=main)](https://scrutinizer-ci.com/g/sakg23/mvc-24/?branch=main)

```markdown

# My Symfony Project


## Overview

Welcome to **My Symfony Project**! This project is a web application built with Symfony, showcasing various routes, JSON responses, and a structured API landing page. It demonstrates Symfony's powerful routing, controller, and response features to create a flexible and responsive application.

## Table of Contents

- [Overview](#overview)
- [Features](#features)
- [Getting Started](#getting-started)
- [Installation](#installation)
- [Running the Application](#running-the-application)
- [Available Routes](#available-routes)
- [Project Structure](#project-structure)
- [Card Game Implementation](#card-game-implementation)
- [License](#license)

## Features

- **API Landing Page**: A dedicated landing page for API routes, with links and descriptions of available endpoints.
- **Extensible Structure**: Easy to add more routes and functionality as needed.
- **Card Game**: An interactive card game with object-oriented PHP classes like `Card`, `CardGraphic`, and `DeckOfCards`, implemented in Symfony.
  - **Deck Management**: View, shuffle, draw, and deal cards.
  - **Session Management**: Keep track of the current deck and drawn cards in user sessions.
  - **UML Class Diagram**: Visual representation of the card game system.

## Getting Started

These instructions will help you set up the project on your local machine for development and testing.

### Prerequisites

Before you begin, ensure you have the following installed:

- **PHP 8.x**
- **Composer** (Dependency manager for PHP)
- **Symfony CLI** (Optional but recommended for easier server management)

## Installation

1. **Clone the Repository**

   Clone the repository to your local machine using Git:

   ```bash
   git clone https://github.com/yourusername/yourrepository.git
   ```

2. **Navigate to the Project Directory**

   ```bash
   cd yourrepository
   ```

3. **Install Dependencies**

   Use Composer to install the project's dependencies:

   ```bash
   composer install
   ```

4. **Set Up Environment Variables**

   Create a `.env.local` file to set up local environment variables if needed (e.g., database credentials).

### Running the Application

To start the application, use the Symfony CLI:

```bash
symfony serve
```

If you're not using Symfony CLI, you can also use PHP’s built-in server:

```bash
php -S localhost:8000 -t public
```

Once the server is running, open your browser and go to [http://localhost:8000](http://localhost:8000).

## Available Routes

The application provides the following routes:

- `/` or `/home` - **Home Page**: Renders the homepage with links to explore the site.
- `/about` - **About Page**: A simple "About" page with project information.
- `/api` - **API Landing Page**: Displays a summary of available JSON routes on this site.
- `/api/lucky/number` - **Lucky Number**: Returns a random lucky number in JSON format.
- `/api/quote` - **Quote of the Day**: Returns a random quote with the current date and timestamp in JSON format.
- **/card** - Card Game Home: Shows the current number of cards in the deck.
- **/card/deck** - Deck of Cards: Displays all the cards in the deck, sorted by suit and value.
- **/card/deck/shuffle** - Shuffle Deck: Shuffles the deck and displays it.
- **/card/deck/draw/{number}** - Draw Cards: Draws a specified number of cards from the deck.
- **/card/session** - Session Overview: Displays the current session data, including the deck and drawn cards.
- **/card/session/delete** - Clear Session: Clears the session, including the deck.


## Project Structure

This project follows a standard Symfony structure with the following key folders:

- `src/Controller`: Contains controllers that manage routes and responses.
- `templates/`: Stores Twig templates for rendering HTML pages.
- `config/`: Contains configuration files, including routes and services.
- `public/`: The document root for the server, where the front controller (`index.php`) is located.

# Card Game Implementation

The card game system is built using object-oriented PHP, with the following classes:

## Card Class
- Represents a single card in the deck.
- Contains properties for suit and value.
- Includes methods to retrieve the suit and value and a string representation of the card.

## CardGraphic Class (inherits from Card)
- Extends the Card class.
- Provides a graphical representation of the card as a string (e.g., A♠ for Ace of Spades).

## DeckOfCards Class
- Represents the entire deck of cards.
- Provides methods to shuffle the deck, draw cards, and reset the deck.
- Cards are stored in an array, and the deck is shuffled using PHP's built-in shuffle function.

## Controller and Routes
The game is managed

## License

This project is licensed under the MIT License. See the [LICENSE](LICENSE) file for details.

---

Happy coding! If you have any questions or encounter issues, feel free to open an issue or contact me directly.
```

---

### Explanation of Each Section

1. **Introductory Image**: Adds visual appeal at the top of the README.
2. **Overview**: Brief introduction to the project.
3. **Table of Contents**: Quick navigation for larger README files.
4. **Features**: Highlights key features of the application.
5. **Getting Started**: Provides prerequisites and setup steps for new users.
6. **Installation**: Detailed instructions to clone the repo and install dependencies.
7. **Running the Application**: Explains how to start the server and access the site.
8. **Available Routes**: Lists available routes with brief descriptions.
9. **Project Structure**: Explains the structure for easier navigation and understanding.
10. **License**: Specifies the project’s license.

This `README.md` is designed to give a complete overview of the project, help users get started quickly, and provide clear instructions for installation and usage.
# mvc-24

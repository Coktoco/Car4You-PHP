# Car4You - Vehicle Rental

## Project Description

Car4You is a vehicle rental system that allows users to browse and rent vehicles such as cars, trucks, and boats. The website offers various functionalities, including searching available vehicles, renting and managing Your current rentals.

## Technologies

- **HTML5**: Content structuring
- **CSS3**: Styling the page
- **Bootstrap 4 & 5**: CSS framework for building responsive pages
- **JavaScript**: Dynamic functions and interactions
- **jQuery**: Facilitates DOM manipulation and event handling
- **Popper.js**: Used in Bootstrap for tooltips and popovers
- **PHP**: Server-side scripting language for form processing and session management

## Project Structure

### HTML Files

#### `index.html`

The main page includes:
- Navigation bar
- Sections for currently available vehicles (cars, trucks, boats)
- Vehicle search forms
- "Finish" button section
- Footer

#### `logowanie.php`

Handles user login and other session-related operations. Processes login data and manages user sessions.

### CSS Files

- **`bootstrap-5.2.3-dist/css/bootstrap-reboot.min.css`**: Bootstrap 5 CSS reset.
- **`excp-styles.css`**: Custom styles for the project.

### JavaScript Files

- **`bootstrap-5.2.3-dist/js/bootstrap.js`**: Bootstrap 5 scripts.
- **`jquery-3.3.1.slim.min.js`**: Used for DOM manipulation and event handling.
- **`popper.js`**: Used in Bootstrap for tooltips and popovers.
- **`bootstrap.min.js`**: Bootstrap 4 scripts for components such as modals and carousels.

### PHP Files

- **`do-wynajecia.php`**: Processes rental requests. Receives data about selected vehicles and users, and performs corresponding server-side operations (e.g., saving to the database).

- **`logowanie.php`**: Manages login and other user session functions.

## Usage

1. **Download the project**: Clone the repository or download the source files.
2. **Installation**: Copy the project to a PHP-enabled server or locally using an environment like XAMPP, WAMP, or MAMP.
3. **Running**: Open `index.html` in a browser to view the homepage. PHP files must be run on a local or remote server that supports PHP.

## Instructions

1. **Navigation**: The homepage features navigation that allows access to various sections, including login and browsing the offer.
2. **Vehicle Search**: In the "Cars", "Trucks", and "Boats" sections, use the search forms to find vehicles by model.
3. **Manage Rentals**: Browse available vehicles and rent them by clicking the appropriate links in the tables. Rental forms are processed by `do-wynajecia.php`.
4. **Carousel**: The homepage includes a carousel showcasing the latest acquisitions with images of vehicles.

## Usage Examples

1. To search for a car, enter the model in the appropriate text field in the "Cars" section and click "Search".
2. To rent a vehicle, click "Rent" next to the desired vehicle in the table.

## License

This project is licensed under the [MIT License](LICENSE).

## Contact

For questions or suggestions, please contact me on Linkedin

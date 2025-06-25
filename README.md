# Sorteador Shell Helix Ultra

This project is a web application for registering Shell Helix Ultra product purchases and conducting random draws among registered participants. The system is built with **PHP 8** (Laravel) for the backend and **React** (Inertia.js) for the frontend, using **MySQL** as the database.

## Features

-   **Participant Registration:** Users can register their purchase by filling out a form with their personal details, city, store, invoice number, and purchased product.
-   **Random Draw:** Allows you to randomly select a winner from the registered participants, displaying the winner's name and saving the result.
-   **Winners List:** Shows a list of previous winners, including relevant details for each.
-   **Reset Winners:** Option to reset the list of winners.

## Technologies Used

-   **Backend:** PHP 8, Laravel
-   **Frontend:** React, Inertia.js, Vite
-   **Database:** MySQL

## Code Structure

### Backend (Laravel)

-   **Routes:** Defined in `routes/web.php`.
    -   `/` Shows the registration form.
    -   `/sorteo` Shows the draw page and the list of winners.
-   **Models:** `Cliente` for participants and `Ganador` for winners.
-   **Controllers:** Handle registration and winner logic (expected in `app/Http/Controllers`).
-   **API:** Routes like `/api/ganadores` and `/api/resetear_ganadores` handle draw and reset actions via POST requests from the frontend.

### Frontend (React + Inertia.js)

-   **Registration Page (`Welcome.jsx`):** Form for users to enter their data and participate in the draw.
-   **Draw Page (`Sorteo.jsx`):** Allows running the random draw, shows the winner, and lists all winners.
-   **Styling:** Uses Tailwind CSS for UI design.

## Installation & Usage

1. **Clone the repository**

    ```sh
    git clone <repo-url>
    cd sorteador
    ```

2. **Install PHP and JS dependencies**

    ```sh
    composer install
    npm install
    ```

3. **Configure environment**

    - Copy `.env.example` to `.env` and set up your MySQL database connection.
    - Generate the application key:
        ```sh
        php artisan key:generate
        ```

4. **Run database migrations**

    ```sh
    php artisan migrate
    ```

5. **Start the servers**

    - Backend (Laravel):
        ```sh
        php artisan serve
        ```
    - Frontend (Vite):
        ```sh
        npm run dev
        ```

6. **Access the application**
    - Registration: [http://localhost:8000/](http://localhost:8000/)
    - Draw: [http://localhost:8000/sorteo](http://localhost:8000/sorteo)

## Development Notes

-   The draw randomly selects a winner from all registered participants.
-   Winner data is stored and can be reset from the UI.
-   The frontend communicates with the backend using Inertia.js and POST requests to API routes.

## Key Files

-   [web.php](http://_vscodecontentref_/0): Main routes and logic for displaying participants and winners.
-   [Welcome.jsx](http://_vscodecontentref_/1): Participant registration form.
-   [Sorteo.jsx](http://_vscodecontentref_/2): Draw page and winners list.
-   [app.jsx](http://_vscodecontentref_/3): Inertia.js and React setup.

---

**Built with Laravel, React, and MySQL.**

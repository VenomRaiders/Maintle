![Getting Started](./blobs/maintle-logo.png)


## MAINTLE PROJECT Description
Maintle is an online movie script business where potential buyers can visit this site and purchase high quality movie scripts. It also comes packaged with an admin dashboard fully equiped to assist the Maintle team in getting the best possible results



## MAINTLE PROJECT Tech Stack
### Frontend
- Vue.js
- HTML/CSS/JS

### Backend
- Laravel 
- Inertia.js
- Node.js

### Utilities
- Vite
- FontAwesome
- Tailwind

### Server | Database 
- AWS

## MAINTLE PROJECT Folder Structure

> **NOTE**: The folders mentioned here are the core folders. You might modify other folders if you're told or aware of what you are doing. But it's Recommended to stick within the overall structure

### Frontend 
```cmd
├───resources
│   ├───css
│   ├───js
│   │   ├───Components
│   │   ├───Layouts
│   │   └───Pages
│   │       ├───Admin
│   │       ├───Auth
│   │       ├───Investor
│   │       └───scriptwriter
│   └───views
```
- `resources`<br>
    This is where all the frontend code resides. 
    1. `resources/css`<br>
        The css folder contains a general styling file which can also be alternatively used to style the website
    2. `resources/js`<br>
        Has all the **.vue** files located here including the bundled js files
    3. `resources/js/Components`<br>
        Contains all the **.vue** components for Maintle
    4. `resources/js/Layouts`<br>
        Contains all the **.vue** layouts for Maintle
    5. `resources/js/Pages`<br>
        The Pages folder contains the different Pages found on the maintle web page. All the components and frontend logic is written in Vue.
    6. `resources/js/Pages/Admin`<br>
        Contains all the frontend code for the **Admin** route/pages
    7. `resources/js/Pages/Auth`<br>
        **Authentication** pages are kept here. Examples of authentication pages are **forgot password, login, register, email verification** etc..
    8. `resources/js/Pages/Investor`<br>
        Contains all the frontend code for the **Investor** route/pages
    9. `resources/js/Pages/Scriptwriters`<br>
        Contains all he frontend code for the **Scriptwriters** route/pages



- This serves the application.
'''cmd
php artisan serve
'''

## Structure
- Coming soon
 
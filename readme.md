# iLunch

An integrated system for managing the needs of the University Student Canteen.

## Table of Contents
- [Overview](#overview)
- [Features](#features)
- [Technologies Used](#technologies-used)
- [Screenshots](#screenshots)
- [Installation](#installation)
- [Usage](#usage)
- [Contributing](#contributing)
- [License](#license)
- [References](#references)

## Overview
**iLunch** is a web‑based platform that streamlines every major workflow in a university canteen—from daily meal planning to real‑time reporting—so that students get faster service and staff spend less time on manual administration.

## Features
- Web platform with responsive design, user role management, and bilingual support (Greek/English)
- Seamless integration with UOWM university authentication system via SSO
- Student meal tracking with ID card scanning functionality
- Digital meal cards with QR code generation for special meal plans
- Interactive menu management with nutritional information and periodic rotation
- Anonymous and user-authenticated feedback collection system
- Real-time announcements and notifications system
- Physical feedback station with Arduino interface and Bluetooth connectivity
- Comprehensive analytics dashboard with graphical reports and statistics
- Top-rated dishes tracking feature with weekly/monthly rankings

## Technologies Used
| Layer | Stack |
|-------|-------|
| **Frontend** | HTML · Blade templates · Vue.js |
| **Backend**  | PHP (Laravel) |

## Screenshots
Here are some previews of the iLunch platform:

### Start Page
![Start Page](https://i.imgur.com/5Aj8Bk7.png)

### Admin Panel
![Admin Panel 1](https://i.imgur.com/vvAfvKc.png)
![Admin Panel 2](https://i.imgur.com/4GfARMj.png)

### Android App
![Android App](https://i.imgur.com/a4EYt1F.png)

### Feedback Station
![Feedback Station](https://i.imgur.com/1kRn0ln.png)


## Installation

### Prerequisites
- **PHP 5.6.4+**
- **Composer**
- **Node.js 18+** (for front‑end assets)
- A web server such as **Apache** or **Nginx**
- A database such as **MySQL 8** or **MariaDB 10.6**

### Steps

1. **Clone the repository**

   ```bash
   git clone https://github.com/mpvasilis/ilunch.git
   cd ilunch
   ```

2. **Install backend dependencies**

   ```bash
   composer install
   ```

3. **Install frontend dependencies**

   ```bash
   npm install && npm run dev
   ```

4. **Configure environment variables**

   ```bash
   cp .env.example .env
   # open .env and update DB_*, MAIL_*, and other keys
   ```

5. **Generate an application key**

   ```bash
   php artisan key:generate
   ```

6. **Run database migrations**

   ```bash
   php artisan migrate --seed
   ```

7. **Start the development server**

   ```bash
   php artisan serve
   ```

   The site is now available at: <http://localhost:8000>

## Usage
- Browse or manage meals via the student/staff interface.  
- Log in as an **administrator** to access inventory, menu planning, and user management.  
- Export data or drill down into **Reports ➜ Analytics** for insights.

## Contributing
We :heart: contributions!  

1. **Fork** the repo.  
2. Create a feature branch:

   ```bash
   git checkout -b feature/my-awesome-feature
   ```

3. Commit & push:

   ```bash
   git add .
   git commit -m "feat: add my awesome feature"
   git push origin feature/my-awesome-feature
   ```

4. Open a **Pull Request** against `main`.

Before submitting, please run:

```bash
./vendor/bin/phpunit   # backend tests
npm run test           # front‑end tests
```

## License
Distributed under the **MIT License**. See [LICENSE](LICENSE) for details.

## References
1. Laravel Framework Documentation – <https://laravel.com/docs>  
2. Vue.js Guide – <https://vuejs.org/guide/>  
3. MIT License – <https://opensource.org/licenses/MIT>

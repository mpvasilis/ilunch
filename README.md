<<<<<<< HEAD
## Laravel 5-3 example ##

**Laravel 5-3 example** is a tutorial application.

It's an upgrade of [this repository](https://github.com/bestmomo/laravel5-example) for Laravel 5.3 with big code cleaning and refactoring and application tests.

### Installation (the slow way) ###

* type `git clone https://github.com/bestmomo/laravel5-3-example.git projectname` to clone the repository 
* type `cd projectname`
* type `composer install`
* type `composer update`
* copy *.env.example* to *.env*
* type `php artisan key:generate`to regenerate secure key
* if you use MySQL in *.env* file :
   * set DB_CONNECTION
   * set DB_DATABASE
   * set DB_USERNAME
   * set DB_PASSWORD
* if you use sqlite :
   * type `touch database/database.sqlite` to create the file
* type `php artisan migrate --seed` to create and populate tables
* edit *.env* for emails configuration
* optionaly type `npm install` to manage assets

### Installation (the fast way) ###

* **for sqlite :** upload [this zip file](http://laravel.sillo.org/tuto/laravel5-3-example.zip) and unzip it in your folder. It's done with sqlite database ! You can make a *composer update* to refresh vendor.
* **for mysql :** upload [this zip file](http://laravel.sillo.org/tuto/laravel5-3-example-mysql.zip) and unzip it in your folder. Create an empty database and follow the installer instructions. You can make a *composer update* to refresh vendor. The installer was made with [this package](https://github.com/bestmomo/laravel5-3-installer).

### Include ###

* [Bootstrap](http://getbootstrap.com) for CSS and jQuery plugins
* [Font Awesome](http://fortawesome.github.io/Font-Awesome) for the nice icons
* [Highlight.js](https://highlightjs.org) for highlighting code
* [Startbootstrap](http://startbootstrap.com) for the free templates
* [CKEditor](http://ckeditor.com) the great editor
* [Elfinder](https://github.com/Studio-42/elFinder) the nice file manager
* [laravel-lipsum](https://github.com/magyarjeti/laravel-lipsum) for the lipsum generator
* [Laravel Collective](https://laravelcollective.com/) for Forms and Html 
* [Sweat Alert](http://t4t5.github.io/sweetalert/) for the cool alerts

### Features ###

* Home page
* Custom error pages 403, 404 and 503
* Authentication (registration, login, logout, password reset, mail confirmation, throttle)
* Users roles : administrator (all access), redactor (create and edit post, upload and use medias in personnal directory), and user (create comment in blog)
* Blog with comments
* Search in posts
* Tags on posts
* Contact us page
* Admin dashboard with messages, users, posts, roles and comments
* Users admin (roles filter, show, edit, delete, create, blog report)
* Posts admin (list with dynamic order, show, edit, delete, create)
* Multi users medias gestion
* Localization
* Application tests
* Use of new notifications to send emails and notify redactors for new comments

### Assets ###

CSS is compiled with Elixir, look at **gulpfile.js** for details.

### Tricks ###

To use application the database is seeding with users :

* Administrator : email = admin@la.fr, password = admin
* Redactor : email = redac@la.fr, password = redac
* User : email = walker@la.fr, password = walker
* User : email = slacker@la.fr, password = slacker

### Tests ###

When you want to launch the tests first rollback the database :

`php artisan migrate:rollback`

Then migrate and seed :

`php artisan migrate --seed`

You can then use PHPUnit
=======
Website ilunch
=======

**Κατασκευή Ολοκληρωμένου Συστήματος ilunch για τη Φοιτητική Λέσχη**

Δημιουργία website για την καλύτερη διαχείριση και παρακολούθηση της φοιτητικής λέσχης. Βασική λειτουργία: Γενική Καταγραφή των ατόμων που έρχονται στη φοιτητική Λέσχη σίτισης του Πανεπιστημίου σε κάποιο γεύμα. Διατήρηση ιστορικού . Δημιουργία γραφημάτων (μήνα, ημέρα,εβδομάδα,γεύμα,πρωινό,απογευματινό,βραδυνό). Εμφάνιση συγκρίσεων περιόδων (μήνα/εβδομάδα/έτος/παραμετροποιήσιμο). Δυνατότητα για λεπτομερή κατάγραφή των ατόμων με σάρωση ταυτότητας από Android 4.4 και άνω και εμφάνιση αν δικαιούται δωρεάν σίτιση ή όχι. Δυνατότητα για δημιουργία καρτών σίτισης ειδικών λειτουργιών (π.χ κάρτα για ΧΧ γεύματα με ημερομηνία λήξης ΧΧΧΧΧΧ ή κάρτα για περίοδο από ΥΥΥΥΥ έως ΧΧΧΧΧ για 1 πρωινό/1 μεσημεριανό/1 βραδυνό). Οι κάρτες θα μπορούν να εκτυπωθούν από το website (PDF) και θα φέρουν φωτογραφία κατόχου, πληροφοριακά στοιχεία κάρτας. Θα πρέπει να έχουν διαστάσεις είτε επαγγελματικής κάρτας ή σαν τις φοιτητικές ταυτότητες. Καταγραφή σε βάση δεδομένων για την καλύτερη επόπτευση της λειτουργίας από τη διοίκηση. Δυνατότητα για προσθήκη μενού (με περιοδικότητα, π.χ. κάθε 2η εβδομάδα Δευτέρα....και επίσης διατροφικές πληροφορίες για τα φαγητά) και αυτόματη εμφάνιση στην πρώτη σελίδα για τη συγκεκριμένη ημέρα. Δυνατότητα τοποθετήσεων ανώνυμων ή επώνυμων κριτικών για συγκεκριμένα φαγητά. Επίσης δυνατότητα για προσωρινές ανακοινώσεις στο site, π.χ. "Για τα επόμενα 30 λεπτά δωρεάν η σίτιση στη Λέσχη". (a) δημιουργία εφαρμογής android, (b) δημιουργία πρωτότυπης κατασκευής με arduino που θα τοποθετηθεί στη λέσχη και θα έχει 3 ή παραπάνω κουμπιά (χαρούμενο πρόσωπο, στεναχωρημένο πρόσωπο, ενδιάμεση-κατάσταση) στο ύψος περίπου 1 μέτρου. Όποιος θέλει κατά την έξοδο θα πατάει το κουμπί που πιστεύει αφορά την ποιότητα του συγκεκριμένου γεύματος, και αυτά θα αποστέλλονται στο site διαχείρισης είτε θα υπάρχει δυνατότητα ένας διαχειριστής με κινητό bluetooth να πλησιάσει τη συσκευή και να τα μεταφορτώσει όλα (δηλάδή offline αποθήκευση σε SD κάρτα στο arduino και μεταφορά σε εφαρμογή android ή οποία θα μπορεί να τα στείλει στο website. Η κατασκευή θα έχει και μια οθόνη στην οποία θα εμφανίζονται είτε μηνύματα (π.χ. Η γνώμη σας μετράει , Ευχαριστούμε για τη γνώμη σας...), στατιστικά (π.χ. Σήμερα καταγράφηκαν 40 γνώμες φοιτητών), ή μηνύματα που θα έχει γράψει ο διαχειριστής είτε στο website είτε μέσω της εφαρμογής του κινητού τηλεφώνου (αν δεν υπάρχει internet και τ arduino είναι offline) και όταν πλησιάζει με το κινητό του θα πατάει "Ενημέρωση ανακοινώσεων και θα στέλνονται τα νέα μηνύματα" μέσω bluetooth. Τα υλικά θα αγοραστούν από το διδάσκοντα, αλλά θα πρέπει να έχει γίνει έρευνα χαμηλού κόστους. Για την επικοινωνία android-website-arduino θα απαιτηθεί η λειτουργία ενός webservice API. H κατασκευή θα πρέπει να είναι σταθερή και επαγγελματική χωρίς να φαίνονται καλώδια breadboard κτλ. Επίσης το website και η android εφαρμογή θα πρέπει να είναι φιλικές προς τους χρήστες (ιδιαίτερα τους άσχετους με θέματα πληροφορικής) και σχεδιαστικά ελκυστικές. Το website θα έχει τους ρόλους: διαχειριστής (όλα ότι κάνουν οι άλλοι, προσθήκη διαγαφή χρηστών και κατηγοριών), φοιτητική μέριμνα (επεξεργασία λίστας δωρεάν φοίτησης,ανακοινώσεων, προβολή feedback), προσωπικό λέσχης (έκδοση καρτών, επεξεργασία λίστας δωρεάν φοίτησης, ανακοινώσεων, μενου, android σάρωση, προβολή feedback), φοιτητής (σύνδεση με SSO, προβολή στοιχείων που τον αφορά αν έχει κάρτα π.χ. ή πόσες φορές πήγε στη λέσχη), ανώνυμος (προβολή μενού και ανακοινώσεων).

Η εργασία αν ολοκληρωθεί έως 31/3/2016 θα δώσει +1 μονάδα επιπρόσθετη βαθμολογία (6->7) σε όλους

> Web:        http://ilunch.vasilis.pw          

>cPanel
>UserName: ilunch
>PassWord: korina<3



                                                 
>>>>>>> 8cf0cd8442d93354259f5ee758051eb4672a4977

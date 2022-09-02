<?php
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\accommodationController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\destinationController;
use App\Http\Controllers\itineraryController;
use App\Http\Controllers\locationController;
use App\Http\Controllers\programController;
use App\Http\Controllers\saleController;
use App\Http\Controllers\websiteController;
use App\Http\Controllers\dashboardController;
use App\Http\Controllers\themeController;
use App\Http\Controllers\TourController;
use App\Http\Controllers\TourcostsummaryController;
use App\Http\Controllers\TourEquiryFormController;
use App\Http\Controllers\SocialmediaController;
use App\Http\Controllers\DeparturesController;
use App\Http\Controllers\GrouptourController;
use App\Http\Controllers\AddonsController;
use App\Http\Controllers\BuyaddonsController;
use App\Http\Controllers\addonshowController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\TitleController;

use App\Http\Controllers\PostBodyController;
use App\Http\Controllers\TestimonyController;
use App\Http\Controllers\TailorMadeController;
use App\Http\Controllers\EnquiryController;

use App\Http\Controllers\ContactsController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\homeController;
use App\Http\Controllers\AttractionController;
use App\Http\Controllers\QuickLinkController;
use App\Http\Controllers\AgentController;
use App\Http\Controllers\PartnerController;
use App\Http\Controllers\TourGuideController;
use App\Http\Controllers\galleryController;
use App\Http\Controllers\commandController;

use App\Http\Controllers\PaymentController;
use App\Http\Controllers\InclusiveController;
use App\Http\Controllers\Auth\AuthController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// website routes
 Route::resource('/', websiteController::class);
 Route::resource('/home', websiteController::class);

Route::get('/ff', function () {
    return view('mformt');
});

Route::get('/stl', function () {
  \Artisan::call('cache:clear');
  \Artisan::call('route:clear');
  \Artisan::call('storage:link');
   dd('cache clear successfully');
});

Route::get('logout', [AuthController::class, 'logout'])->name('logout');
Route::get('flush', [AuthController::class, 'flush'])->name('flush');

//Route::get('login', [AuthController::class, 'index'])->name('login');
Route::post('post-login', [AuthController::class, 'postLogin'])->name('login.post');

Route::resource('/Agents', AgentController::class);
Auth::routes();
//Route::middleware(['auth', 'Admin'])->group(function () {
Route::group(['middleware' => ['auth','Account']], function() {
Route::get('/l', [commandController::class, 'index'])->name('c');

});
// Route::group(['middleware' => ['auth']], function() {
  Route::group(['middleware' => ['auth','Admin']], function() {

        Route::post('post-registration', [AuthController::class, 'postRegistration'])->name('register.post');
       Route::get('/new-user', [AuthController::class, 'registration'])->name('new-user');
    Route::get('/user-show/{x}', [AuthController::class, 'show'])->name('user-show');
    Route::post('/user-update/{x}', [AuthController::class, 'update'])->name('user-update');

      Route::get('/user-destroy/{x}', [AuthController::class, 'destroy'])->name('user-destroy');
    Route::get('/user-list', [AuthController::class, 'userList'])->name('user-list');
    // Route::get('/new-login', [RegisterController::class, 'login'])->name('new-login');


   Route::get('/Agent-Destroy/{x}', [AgentController::class, 'destroy'])->name('Agent-Destroy');
Route::get('/New-Agent-show/{x}', [AgentController::class, 'show'])->name('New-Agent-show');

Route::post('/New-Agent-update/{x}', [AgentController::class, 'update'])->name('New-Agent-update');

Route::get('/Guide-Destroy/{x}', [TourGuideController::class, 'destroy'])->name('Guide-Destroy');

Route::resource('/Partner', PartnerController::class);
Route::get('/Partner-Destroy/{x}', [PartnerController::class, 'destroy'])->name('Partner-Destroy');

Route::resource('/PostBody', PostBodyController::class);

//accommodation controller
Route::resource('/accommodations', accommodationController::class);
Route::get('/editAccommodation/{x}', [accommodationController::class, 'editAccommodation'])->name('editAccommodation');
Route::get('/accommodation-Destroy/{x}', [accommodationController::class, 'destroy'])->name('accommodation-Destroy');
//End of accommodation controller
Route::resource('/dashboard', dashboardController::class);
Route::resource('/programs', programController::class);

Route::resource('/itineraries', itineraryController::class);
});



// Route::resource('/Agents', AgentController::class);
Route::get('/New-Agent', [AgentController::class, 'NewAgent'])->name('NewAgent');

// Route::get('/Agent-Destroy/{x}', [AgentController::class, 'destroy'])->name('Agent-Destroy');
// Route::get('/New-Agent-show/{x}', [AgentController::class, 'show'])->name('New-Agent-show');
// Route::post('/New-Agent-update/{x}', [AgentController::class, 'update'])->name('New-Agent-update');


// Route::resource('/Tour-Guide', TourGuideController::class);
Route::get('/New-tourGuide', [TourGuideController::class, 'NewTourGuide'])->name('NewTourGuide');
Route::resource('/Tour-Guide', TourGuideController::class);
Route::get('/Guide-Destroy/{x}', [TourGuideController::class, 'destroy'])->name('Guide-Destroy');

// Route::resource('/Partner', PartnerController::class);
Route::get('/New-Partner', [PartnerController::class, 'NewPartner'])->name('NewPartner');
// Route::get('/Partner-Destroy/{x}', [PartnerController::class, 'destroy'])->name('Partner-Destroy');
//End of Agent

Route::resource('/PostBody', PostBodyController::class);
Route::get('/coa/', [PostBodyController::class, 'coa'])->name('coa');
Route::get('/coa-About/', [PostBodyController::class, 'createAbout'])->name('coa-About');
Route::get('/destroy-Aboutus/{x}', [PostBodyController::class, 'destroy'])->name('destroy-Aboutus');
Route::get('/destroy-contact/{x}', [PostBodyController::class, 'destroyContact'])->name('contact-Aboutus');
Route::resource('/PostCategory', PostController::class);

//Welcome introduction
Route::get('/aboutus', [PostBodyController::class, 'aboutus'])->name('aboutus');
Route::get('/welcomeMessage', [PostBodyController::class, 'welcomeMessage'])->name('welcomeMessage');
Route::get('/createMessage', [PostBodyController::class, 'createMessage'])->name('createMessage');
Route::get('/editMessage', [PostBodyController::class, 'editMessage'])->name('editMessage');
Route::get('/editContact', [PostBodyController::class, 'editContact'])->name('editContact');
Route::get('/editAboutus', [PostBodyController::class, 'editAboutus'])->name('editAboutus');
Route::get('/editOthers/{x}', [PostBodyController::class, 'editOthers'])->name('editOthers');

//What We Offer
Route::resource('/Service',ServiceController::class);
Route::get('/whatWeOffer', [ServiceController::class, 'whatWeOffer'])->name('whatWeOffer');
//Route::get('/addWhatWeOffer', [PostBodyController::class, 'addWhatWeOffer'])->name('addWhatWeOffer');
Route::get('/editWhatWeOffer/{x}', [ServiceController::class, 'editWhatWeOffer'])->name('editWhatWeOffer');
Route::get('/whatWeOfferClient', [ServiceController::class, 'whatWeOfferClient'])->name('whatWeOfferClient');
Route::get('/whatWeOffer-Destroy/{x}', [ServiceController::class, 'destroy'])->name('whatWeOffer-Destroy');
//End what we offer

Route::resource('/tourForm', TourEquiryFormController::class);
Route::resource('/socialMedia', SocialmediaController::class);
Route::get('/socialMedia-show/{x}', [SocialmediaController::class, 'show'])->name('socialMedia-show');
Route::post('/socialMedia-update/{x}', [SocialmediaController::class, 'update'])->name('socialMedia-update');
Route::get('/socialMedia-Destroy/{x}', [SocialmediaController::class, 'destroy'])->name('socialMedia-Destroy');

Route::resource('/departures', DeparturesController::class);
//Route::resource('/BlogCategory', BlogController::class);
//Route::resource('/BlogBody', BlogBodyController::class);

//payment Controllers
Route::resource('/Pay', PaymentController::class);
Route::post('/tailorPay/{x}', [PaymentController::class, 'tailorPay'])->name('tailorPay');
 Route::get('/tailorMade-status/{x}', [TailorMadeController::class, 'statusUpdate'])->name('tailorMade-status');
Route::post('/privatePay/{y}', [PaymentController::class, 'privatePay'])->name('privatePay');
Route::post('/groupPay/{x}', [PaymentController::class, 'groupPay'])->name('groupPay');
Route::get('/privateTourSumary/{x}', [PaymentController::class, 'privateTourSumary'])->name('privateTourSumary');
Route::get('/groupTourSumary/{x}', [PaymentController::class, 'groupTourSumary'])->name('groupTourSumary');
//End of payment controller

//Contact part
Route::get('/mailing', [PostBodyController::class, 'contact'])->name('contact');
//End of Contact part

 Route::resource('/tailorMade', TailorMadeController::class);
Route::get('/tailorForm', [TailorMadeController::class, 'tailorForm'])->name('tailorForm');
Route::get('/editTailor/{x}', [TailorMadeController::class, 'editTailor'])->name('editTailor');
Route::get('/updateTailor/{x}', [TailorMadeController::class, 'update'])->name('updateTailor');

Route::get('/tailorDestroy/{x}', [TailorMadeController::class, 'destroy'])->name('tailorDestroy');

Route::get('/offers', [saleController::class, 'offers'])->name('offers');

Route::get('popularExperienceClient',[websiteController::class,'popularExperienceClient'])->name('popularExperienceClient');
Route::get('/circuitTour/{x}', [websiteController::class, 'circuitTour'])->name('circuitTour');

Route::get('/attachmentTailorMade/{x}', [TailorMadeController::class, 'attachmentTailorMade'])->name('attachmentTailorMade');

Route::post('/clientTailorMade', [TailorMadeController::class, 'clientTailorMade'])->name('clientTailorMade');
Route::POST('/viewTrip', [TourEquiryFormController::class, 'viewTrip'])->name('viewTrip');

Route::get('/tailorClientForm', [TailorMadeController::class, 'tailorClientForm'])->name('tailorClientForm');
Route::get('/bookingTrip', [TourEquiryFormController::class, 'bookingTrip'])->name('bookingTrip');

// Enquiry
Route::resource('/enquiry', EnquiryController::class);
Route::get('/enquiry/{x}', [EnquiryController::class, 'enquiry'])->name('enquiry');
Route::get('/bookFor/{x}', [EnquiryController::class, 'bookFor'])->name('bookFor');
Route::get('/editEnquiry/{x}', [EnquiryController::class, 'editEnquiry'])->name('editEnquiry');

Route::get('/enquiry-destroy/{x}', [EnquiryController::class, 'destroy'])->name('enquiryDestroy');

Route::post('/storeTailorMade/{x}', [TailorMadeController::class, 'storeTailorMade'])->name('storeTailorMade');

Route::get('/safaris-slider/{x}', [TourController::class, 'safarisSlider'])->name('safaris-slider');
Route::get('/safaris-slider-packages/{x}', [TourController::class, 'safarisSliderTourPackages'])->name('safaris-slider-packages');

Route::resource('/safaris', TourController::class);
Route::get('/trekking', [TourController::class,'trekking']);
Route::get('/holiday', [TourController::class,'holiday']);
Route::get('/dayTours', [TourController::class,'dayTours']);
Route::get('/combinedTours', [TourController::class,'combinedTours']);
Route::get('/historical-sites', [TourController::class,'historicalSites']);
Route::get('/cultural', [TourController::class,'culturalTours']);
Route::resource('/grouptour', GrouptourController::class);
//Galleries
Route::get('/safaris-gallery', [galleryController::class, 'safarisGallery'])->name('safaris-gallery');
 Route::get('/hiking-gallery', [galleryController::class, 'hikingGallery'])->name('hiking-gallery');
  Route::get('/beach-gallery', [galleryController::class, 'beachGallery'])->name('beach-gallery');
   Route::get('/group-gallery', [galleryController::class, 'groupGallery'])->name('group-gallery');
   Route::get('/day-gallery', [galleryController::class, 'dayGallery'])->name('day-gallery');
    Route::get('/historical-gallery', [galleryController::class, 'historicalGallery'])->name('historical-gallery');
//End of Galleries

Route::get('/Group-scheduled', [GrouptourController::class,'GS']);
Route::get('/special-occasions', [GrouptourController::class,'SO']);
Route::get('/Utali-nyumani', [GrouptourController::class,'UN']);
//Tour Cost Summary controller
Route::resource('/tourcostsummary', tourcostsummaryController::class);
Route::get('/editTourSummary/{x}',[tourcostsummaryController::class, 'edit'])->name('editTourSummary');
Route::post('/updateSummary', [tourcostsummaryController::class, 'update'])->name('updateSummary');

Route::get('/deleteSummary/{x}', [tourcostsummaryController::class, 'destroy'])->name('deleteSummary');
//End of Tour Cost Summary controller

Route::get('/customers', [TourEquiryFormController::class, 'customers'])->name('customers');

Route::get('/activeGroupTrip', [TourEquiryFormController::class, 'activeGroupTrip'])->name('activeGroupTrip');
//Route::get('/contacts', [ContactsController::class, 'contacts'])->name('contacts');
Route::resource('/contacts', ContactsController::class);

//Program controller
Route::get('/editProgram/{x}', [programController::class, 'editProgram'])->name('editProgram');
Route::post('/updatef/{x}', [programController::class, 'updatef'])->name('updatef');
Route::get('/destroyf/{x}', [programController::class, 'destroyf'])->name('destroyf');
//End Program controller

//Titles controller
Route::resource('/titles', TitleController::class);
Route::get('/title-list', [TitleController::class, 'titles'])->name('titles');
Route::get('/destroy-titles/{x}', [TitleController::class, 'destroy'])->name('destroy-titles');
//End Titles controller

Route::resource('/add-ons', AddonsController::class);
Route::resource('/buy-addons', BuyaddonsController::class);
Route::resource('/addons', addonshowController::class);

Route::resource('/Testimonies', TestimonyController::class);
Route::get('/Testimony-Comment', [TestimonyController::class, 'clientComment'])->name('clientComment');

Route::get('/Testimony-create', [TestimonyController::class, 'create'])->name('TestimonyCreate');
Route::post('/Testimony-update/{x}', [TestimonyController::class, 'update'])->name('TestimonyUpdate');

Route::get('/Testimony-destroy/{x}', [TestimonyController::class, 'destroy'])->name('TestimoniesDestroy');
Route::get('/Testimony-edit/{x}', [TestimonyController::class, 'edit'])->name('TestimoniesEdit');

//accommodation controller
//Route::get('/accommodationList', [accommodationController::class, 'accommodationList'])->name('accommodationList');
Route::get('/accommodation-hotels', [accommodationController::class, 'accommodationList'])->name('accommodation-hotels');
Route::get('/accommodation-camps', [accommodationController::class, 'accommodationCamp'])->name('accommodation-camps');

//End of accommodation controller

Route::post('/updateItenary', [itineraryController::class, 'updateItenary'])->name('updateItenary');
//Route::resource('/itineraries', itineraryController::class);

Route::resource('/locations', locationController::class);
Route::get('/location-edit/{x}', [locationController::class, 'edit'])->name('location-edit');
Route::post('/location-update/{x}', [locationController::class, 'update'])->name('location-update');
Route::get('/location-Destroy/{x}', [locationController::class, 'destroy'])->name('location-Destroy');

Route::resource('/destinations', destinationController::class);
Route::get('/destination-edit/{x}', [destinationController::class, 'edit'])->name('destination-edit');
Route::post('/destination-update/{x}', [destinationController::class, 'update'])->name('destination-update');
Route::get('/destination-Destroy/{x}', [destinationController::class, 'destroy'])->name('destination-Destroy');

//Edit saleController
Route::resource('/sales', saleController::class);
Route::get('/editOffer/{x}', [saleController::class, 'editOffer'])->name('editOffer');
Route::post('/update-offer/{x}', [saleController::class, 'update'])->name('update-offer');
Route::get('/offer-Destroy/{x}', [saleController::class, 'destroy'])->name('offer-Destroy');
//End of saleController

Route::get('/editPopularExperience/{x}', [saleController::class, 'editPopularExperience'])->name('editPopularExperience');
Route::POST('/updatePopularExperience/{x}', [saleController::class, 'updatePopularExperience'])->name('updatePopularExperience');
//End of saleController
Route::get('popularExperience',[saleController::class,'popularExperience'])->name('popularExperience');

Route::resource('/themes',themeController::class);
Route::get('/themes-destroy/{x}', [themeController::class, 'destroy'])->name('themes-destroy');

//inclusives
Route::resource('/inclusive',InclusiveController::class);
 // Route::post('/inclusiveUpdate/{x}', 'InclusiveController@inclusiveUpdate')->name('inclusiveUpdate');
Route::POST('/inclusiveUpdate/{x}',[InclusiveController::class, 'inclusiveUpdate'])->name('inclusiveUpdate');


Route::get('/addInclusive',[InclusiveController::class, 'addinclusive'])->name('addinclusive');
Route::get('/editInclusive/{x}',[InclusiveController::class, 'editInclusive'])->name('editInclusive');
Route::get('/destroyInclusive/{x}',[InclusiveController::class, 'destroyf'])->name('destroyf');

// Home page route
Route::resource('/page',homeController::class);
Route::get('/pages',[homeController::class,'addPage']);
Route::get('/widget',[homeController::class, 'widget'])->name('widget');
Route::get('/widgetList',[homeController::class, 'widgetList'])->name('widgetList');
Route::get('/editWidget/{x}',[homeController::class, 'editWidget'])->name('editWidget');

Route::get('/galleries',[homeController::class, 'galleries'])->name('galleries');
//Page Creation
//Route::resource('/createPage',homeController::class);
Route::get('/createPage',[homeController::class, 'createPage'])->name('createPage');
Route::post('pageWidgetList/{x}',[homeController::class, 'pageWidgetList'])->name('pageWidgetList');


//Page Creation
//Route::resource('/createPage',homeController::class);
//Route::get('/section',[homeController::class, 'section'])->name('section');
Route::get('section',[homeController::class, 'section'])->name('section');
Route::get('section-number/{x}',[homeController::class, 'section'])->name('section');

//Attractions
  Route::resource('/Attraction',AttractionController::class);
  Route::get('drongo-attractions',[AttractionController::class, 'drongoAttraction'])->name('drongo-attraction');
 //Route::resource('/EditAttraction/{x}',AttractionController::class);
 Route::get('EditAttraction/{x}',[AttractionController::class, 'EditAttraction'])->name('EditAttraction');
Route::get('Attraction-Client/{circuit}',[AttractionController::class, 'attractionClient'])->name('attractionClient');
Route::get('Attraction-Summary/{x}',[AttractionController::class, 'attractionSummary'])->name('attractionSummary');
Route::get('/attraction-Destroy/{x}', [AttractionController::class, 'destroy'])->name('attraction-Destroy');
//QuickLinks controller
  Route::resource('/quickLink',QuickLinkController::class);
  Route::get('EditQuickLink/{x}',[QuickLinkController::class, 'EditQuickLink'])->name('EditQuickLink');

    Route::get('QuickLink/{x}',[QuickLinkController::class, 'QuickLinkSummary'])->name('QuickLinkSummary');
    Route::post('QuickLink-Update/{x}',[QuickLinkController::class, 'update'])->name('QuickLink-Update');
    Route::get('QuickLink-Destroy/{x}',[QuickLinkController::class, 'destroy'])->name('QuickLink-Destroy');
//main page website
Route::get('/main-page/{id}',[homeController::class,'mainPage']);
require __DIR__.'/auth.php';

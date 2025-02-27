<?php
defined('BASEPATH') or exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
*/
$route['default_controller'] = 'welcome/index';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
$route['ajax'] = 'welcome/ajaxCall';
$route['get-data'] = 'welcome/getData';
$route['login'] = 'welcome/login';
$route['OtpSend'] = 'welcome/OtpSend';
$route['OtpVerify'] = 'welcome/OtpVerify';
$route['ResetPassword'] = 'welcome/ResetPassword';
$route['logout'] = 'welcome/logout';
$route['sign-in'] = 'welcome/signin';
$route['play-earn'] = 'welcome/playnEarn';
$route['profile'] = 'welcome/profile';
$route['refer-earn'] = 'welcome/refernEarn';
$route['latest-jobs'] = 'welcome/latest_jobs';
$route['save'] = 'welcome/save';
$route['updateAns'] = 'welcome/updateAns';
$route['register'] = 'welcome/registerIt';
$route['signup'] = 'welcome/signup';
$route['test'] = 'welcome/test';
$route['BMI-Calculator'] = 'welcome/BmiCalculator';
$route['single-bmi-delete'] = 'welcome/BmiDeleteData';
$route['Diet-Plan'] = 'welcome/DietPlan';
$route['getbmidata'] = 'welcome/getbmidata';
$route['Results'] = 'welcome/Results';
$route['Symptoms'] = 'welcome/Symptoms';
$route['ReferEarn'] = 'welcome/ReferEarn';
$route['get-user-data'] = 'welcome/getUserData';
$route['saveTestRecord'] = 'welcome/saveTestRecord';
$route['Thankyou'] = 'welcome/Thankyou';
$route['NearLabs'] = 'welcome/NearLabs';
$route['getdatabmi'] = 'welcome/getdatabmi';
$route['MyProfile'] = 'welcome/MyProfile';
$route['UpdateProfile'] = 'welcome/UpdateProfile';
$route['updateprofileimg'] = 'welcome/updateprofileimg';
$route['updatepassword'] = 'welcome/updatepassword';
$route['BmiHistory'] = 'welcome/BmiHistory';
$route['course'] = 'welcome/ViewAll';
$route['webinar'] = 'welcome/webinar';
$route['testdiscreption'] = 'welcome/testdiscreption';
$route['viewtestdiscreption'] = 'welcome/viewtestdiscreption';
$route['DisesesList'] = 'welcome/DisesesList';
$route['getdiscriptin'] = 'welcome/getdiscriptin';
$route['DisesesAllList'] = 'welcome/DisesesAllList';
$route['getCategoryName'] = 'welcome/getCategoryName';
$route['getDiseasesName'] = 'welcome/getDiseasesName';
$route['getTestName'] = 'welcome/getTestName';
$route['getRoadMapName'] = 'welcome/getRoadMapName';
$route['checkbmi'] = 'welcome/checkbmi';
$route['checkdietplan'] = 'welcome/checkdietplan';
$route['diet-plan'] = 'welcome/dietplanshow';
$route['DiseasesByTestName'] = 'welcome/DiseasesByTestName';
$route['commingsoon'] = 'welcome/commingsoon';
$route['crop_image_upload'] = 'welcome/crop_image_upload';
$route['remove'] = 'welcome/remove';
$route['enroll-now'] = 'welcome/enrollnow';
$route['enroll-courses'] = 'welcome/Enrollcourse';
$route['test-dashboard'] = 'welcome/testdashboard';
$route['analytics'] = 'welcome/authenticate_google';
$route['analytics/oauth_callback'] = 'welcome/oauth_callback';
$route['webinardiscreption'] = 'welcome/webinardiscreption';
$route['jobdiscreption'] = 'welcome/jobdiscreption';
$route['road-map'] = 'welcome/roadmap';
$route['roadmapdescription'] = 'welcome/roadmapdescription';
$route['play/(:any)'] = 'welcome/loadGame/$1';
$route['load-games'] = 'welcome/getGame';
$route['getNotification'] = 'welcome/getNotification';
$route['NotificationStatus'] = 'welcome/NotificationStatus';
$route['getNotificationCounter'] = 'welcome/getNotificationCounter';
$route['Test'] = 'welcome/TestName';
$route['saveTest'] = 'welcome/saveTest';

// For the Seat Booking
$route['EventBooking'] = 'welcome/EventBooking';
$route['getStudentDetails'] = 'welcome/getStudentDetails';
$route['SavePayment'] = 'welcome/SavePayment';
$route['SeatBooking'] = 'welcome/seatbooking';
$route['SeatBooking/save'] = 'Welcome/saveSeat';
$route['EventDetails'] = 'Welcome/EventDetails';


////////////////////////////////////////////---Admin Section----//////////////////////////////////////////////////////////////////
$route['admin'] = 'AdminController/admin';
$route['Dashboard'] = 'AdminController/Dashboard';
$route['Add-User'] = 'AdminController/AddUser';
$route['View-User'] = 'AdminController/ViewUser';
$route['Send-Message'] = 'AdminController/SendMessage';
$route['Send-Email-Message'] = 'AdminController/SendEmailMessage';
$route['Profile'] = 'AdminController/Profile';
$route['delete-Record'] = 'AdminController/deleteRecord';
$route['User-View-Details'] = 'AdminController/UserViewDetails';
$route['update-User-Record'] = 'AdminController/updateUserRecord';
$route['Register-Form'] = 'AdminController/Register';
$route['Forget-Password'] = 'AdminController/ForgetPassword';
$route['AccessLogin'] = 'AdminController/AccessLogin';
$route['Log-out'] = 'AdminController/Logout';
$route['Forget-Email'] = 'AdminController/ForgetEmail';
$route['Name-Wise-Message'] = 'AdminController/nameWiseMessage';
$route['Email-Wise-Message'] = 'AdminController/emailWiseMessage';
$route['Profile-Update'] = 'AdminController/ProfileUpdate';
$route['Demography'] = 'AdminController/Demography';
$route['Live-Users'] = 'AdminController/LiveUsers';
$route['Products-Listed'] = 'AdminController/ProductsListed';
$route['Add-Products'] = 'AdminController/AddProducts';
$route['Query-Request'] = 'AdminController/QueryRequest';
$route['Testimonial'] = 'AdminController/Testimonial';
$route['Check-Dq'] = 'AdminController/CheckDq';
$route['User-Query'] = 'AdminController/UserQuery';
$route['Our-Blogs'] = 'AdminController/OurBlogs';
$route['Save-Product'] = 'AdminController/SaveProduct';
$route['Save-Testimonial'] = 'AdminController/SaveTestimonial';
$route['View-Testimonial'] = 'AdminController/ViewTestimonial';
$route['Save-Blog'] = 'AdminController/SaveBlog';
$route['View-Blogs'] = 'AdminController/ViewBlogs';
$route['Save-Profile-Image'] = 'AdminController/UploadImage';
$route['Enrolled-Courses'] = 'AdminController/EnrolledCourses';
$route['View-Courses'] = 'AdminController/ViewCourses';
$route['GetRecord'] = 'AdminController/GetRecord';
$route['UserMessageNotification'] = 'AdminController/UserMessageNotification';
$route['addjob'] = 'AdminController/addjob';
$route['savejob'] = 'AdminController/savejob';
$route['joblist'] = 'AdminController/joblist';
$route['GetAllEmail'] = 'AdminController/GetAllEmail';
$route['SendMessageByEmail'] = 'AdminController/SendMessageByEmail';
$route['Send-sms-schedule'] = 'AdminController/SendSMSSchedule';
$route['ajaxfetchcity'] = 'AdminController/ajaxfetchcity';
$route['Save-Sms-data'] = 'AdminController/Savesmsdata';
$route['sms-View-Details'] = 'AdminController/SmsViewDetails';
$route['update-Sms-Record'] = 'AdminController/updateSmsRecord';
$route['sms-enabled-Details'] = 'AdminController/smsenabledDetails';
$route['Enabled-Sms-Record'] = 'AdminController/EnabledSmsRecord';
$route['sms-disabled-Details'] = 'AdminController/smsdisabledDetails';
$route['Disabled-Sms-Record'] = 'AdminController/DisabledSmsRecord';
$route['media'] = 'AdminController/getMedia';
$route['PushNotification'] = 'AdminController/PushNotification';
$route['EmailNotification'] = 'AdminController/EmailNotification';





<?php

use Illuminate\Support\Facades\Auth;

Auth::routes();

Route::get('/', 'FormController@index')->name('project.create');

Route::get('/accreditation-type/details', 'AccreditationTypeController@index')->name('get.accreditation-type');

Route::get('/accreditation-type-non-mli/details', 'AccreditationTypeNonMLIController@index')->name('get.accreditation-type-non-mli');

Route::get('/accreditation-type/edit', 'AccreditationTypeController@edit')->name('accreditation-type-edit');

Route::get('/accreditation-type-non-mli/edit', 'AccreditationTypeNonMLIController@edit')->name('get.accreditation-type-non-mli-edit');

Route::get('/activity/get/jp-contact', 'ActivityController@getJpContacts')->name('activity.get-jp-contact');

Route::get('/activity/get/jp-contact-2', 'ActivityController@getJpContacts2')->name('activity.get-jp-contact-2');

Route::get('/activity/get/jp-contact-3', 'ActivityController@getJpContacts3')->name('activity.get-jp-contact-3');

Route::get('/activity/get/ep-contact', 'ActivityController@getEpContacts')->name('activity.get-ep-contact');

Route::get('/activity/get/ep-contact-2', 'ActivityController@getEpContacts2')->name('activity.get-ep-contact-2');


Route::get('/get/jp-contact', 'GetJpContractController@create')->name('get.jp-contact');

Route::get('/get/jp-contact-2', 'GetJpContractController@create2')->name('get.jp-contact-2');

Route::get('/get/jp-contact-3', 'GetJpContractController@create3')->name('get.jp-contact-3');

Route::get('/get/jp-contact/edit', 'GetJpContractController@edit')->name('get.jp-contact-edit');

Route::get('/get/jp-contact-2/edit', 'GetJpContractController@edit2')->name('get.jp-contact-2-edit');

Route::get('/get/jp-contact-3/edit', 'GetJpContractController@edit3')->name('get.jp-contact-3-edit');

Route::get('/get/moc', 'GetMocController@index')->name('get-moc');

Route::get('/get/moc/edit', 'GetMocController@edit')->name('get-moc-edit');

Route::get('project/remove-individual', 'ProjectController@removeConInd')->name('project.remove-individual');

Route::post('validate/step1', 'FormController@validateStep1')->name('validate.step1');

Route::post('project', 'FormController@store')->name('project.store');

Route::get('signup/{token}', 'RegisterController@index')->name('user.signup');
Route::post('signup/{token}', 'RegisterController@store')->name('user.store');

Route::get('activity/view', 'OutcomeReportController@getActivity')->name('get.activity');

Route::get('activity-participant/view', 'ActivityParticipantController@getActivity')->name('get.activity-participant');

Route::group(['prefix' => 'admin', 'middleware' => ['auth']], function () {

  Route::get('/', 'DashboardController@index')->name('dashboard');

  Route::get('/notifications', 'NotificationController@index')->name('notification-lists');

  Route::post('/notifications/read', 'NotificationController@read')->name('notification-read');


  /**
   * Add Activity
   */
  Route::get('activity', 'ActivityController@create')->name('add.activity');

  Route::POST('activity', 'ActivityController@store')->name('store.activity');


  /**
   * Users
   */
  Route::get('users', 'UserController@index')->name('users.index');

  Route::POST('change-password', 'UserController@updatePassword')->name('change.password');

  Route::POST('users/change-password/{id}', 'UserController@updateUserPassword')->name('user.change.password');

  Route::get('users/edit/{user}', 'UserController@edit')->name('users.edit');

  Route::POST('users/update/{user}', 'UserController@update')->name('users.update');


  /**
   * Profile
   */
  Route::get('users/profile/{user}', 'ProfileController@show')->name('profile.show');

  Route::get('users/{user}/edit', 'ProfileController@edit')->name('profile.edit');

  Route::POST('users/profile/{user}', 'ProfileController@update')->name('profile.update');

  /**
   * Projects
   */
  Route::get('projects/load', 'ProjectLoadController@index')->name('projects.load');
  Route::get('projects', 'ProjectController@index')->name('projects.index');
  Route::get('projects/csv', 'ProjectController@csv')->name('projects.csv');
  Route::get('projects/excel', 'ProjectController@excel')->name('projects.excel');
  Route::get('projects/pdf', 'ProjectController@pdf')->name('projects.pdf');
  Route::get('projects/em-planning', 'ProjectController@emPlanning')->name('projects.em-planning');
  Route::get('projects/unassigned', 'ProjectController@unassigned')->name('projects.unassigned');
  Route::get('user-projects', 'UserProjectController@index')->name('user-projects.index');
  Route::get('user-projects/csv', 'UserProjectController@csv')->name('user-projects.csv');
  Route::get('user-projects/excel', 'UserProjectController@excel')->name('user-projects.excel');
  Route::get('user-projects/pdf', 'UserProjectController@pdf')->name('user-projects.pdf');
  Route::get('projects/{project}', 'ProjectController@show')->name('project.show');
  Route::PUT('projects/{project}', 'ProjectController@update')->name('project.update');
  Route::PUT('projects/note/{project}', 'ProjectController@updateNotes')->name('project-note.update');
  Route::PUT('projects/memo/{project}', 'ProjectController@updateMemo')->name('project-memo.update');
  Route::post('projects/related-documents/{project}', 'ProjectController@updateRelatedDocuments')->name('project-related-documents.update');
  Route::get('/projects/{project}/edit', 'ProjectController@edit')->name('project.edit');
  Route::post('/projects/clone/{id}', 'ProjectController@clone')->name('project.clone');
  Route::PUT('projects/status/{project}', 'ProjectStatusController@update')->name('project.status');
  Route::GET('assign/project/{project}', 'ProjectAssignedController@edit')->name('project.assign');
  Route::PATCH('assigned/projects/{project}', 'ProjectAssignedController@update')->name('project.assigned');


  Route::get('/projects/{project}/evidence/edit', 'ProjectResourceController@editEvidence')->name('project.evidence.edit');
  Route::PUT('/projects/{project}/evidence/edit', 'ProjectResourceController@storeEvidence')->name('project.evidence.store');
  Route::POST('/projects/{project}/upload', 'FileController@store')->name('project.upload');
  Route::PUT('/projects/file/{file}/destroy', 'FileController@destroy')->name('file.delete');

  Route::get('/projects/{project}/disclosures/edit', 'ProjectResourceController@editDisclosures')->name('project.disclosures.edit');
  Route::PUT('/projects/{project}/disclosures/edit', 'ProjectResourceController@storeDisclosures')->name('project.disclosures.store');

  Route::get('/projects/{project}/commercial-support/edit', 'ProjectResourceController@editCommercialSupport')->name('project.commercial-support.edit');
  Route::PUT('/projects/{project}/commercial-support/edit', 'ProjectResourceController@storeCommercialSupport')->name('project.commercial-support.store');

  Route::get('/projects/{project}/jac/edit', 'ProjectResourceController@editJac')->name('project.jac.edit');
  Route::PUT('/projects/{project}/jac/edit', 'ProjectResourceController@storeJac')->name('project.jac.store');

  Route::get('/projects/{project}/review', 'ProjectResourceController@review')->name('project.review');
  Route::patch('/projects/{project}/file/update', 'FileController@update')->name('project.review.update');

  Route::get('no-access', 'DashboardController@noAccess')->name('no-access');

  Route::post('messages', 'MessageController@store')->name('messages.store');

  /**
   * Uploads
   */
  Route::get('uploads/em-analysis', 'OutcomeReportController@report')->name('outcome.report');
  Route::post('uploads/em-analysis/import', 'OutcomeReportController@import')->name('outcome.report.import');

  Route::get('outcome', 'OutcomeReportController@index')->name('outcome.index');
  Route::get('outcome/{outcome}', 'OutcomeReportController@show')->name('outcome.show');
  Route::get('outcome/{outcome}/edit', 'OutcomeReportController@edit')->name('outcome.edit');
  Route::PUT('outcome/{outcome}', 'OutcomeReportController@update')->name('outcome.update');

  Route::get('uploads/activity-participant', 'ActivityParticipantController@index')->name('activity.participant');
  Route::post('uploads/activity-participant/import', 'ActivityParticipantController@import')->name('activity.participant.import');


  /**
   * JAC15 - Training
   */
  Route::resource('jac15', 'Jac15Controller');

  /**
   * Audience Type
   */
  Route::resource('audience-types', 'AudienceTypeController');


  /**
   * Credit Type
   */
  Route::resource('credit-types', 'CreditTypeController');

  /**
   * Joint Provider Contact
   */
  Route::resource('joint-provider-contacts', 'JpContactController');

  /**
   * Educational Partner Contact
   */
  Route::resource('educational-partner-contacts', 'EpContactController');

  /**
   * moc boards
   */
  Route::resource('moc-boards', 'MocBoardController');

  /**
   * moc credit types
   */
  Route::resource('moc-credit-types', 'MocCreditTypeController');


  /**
   * moc board practice
   */
  Route::resource('moc-practices', 'MocPracticeController');


  /**
   * moc boards
   */
  Route::resource('ilna-codes', 'IlnacodeController');

  /**
   * Joint Provider
   */
  Route::resource('joint-providers', 'JointProviderController');
  Route::resource('educational-partners', 'EducationalPartnerController');


  /**
   * Mli Fees
   */
  Route::resource('mli-fees', 'MliFeeController');


  /**
   * Reports
   */
  Route::get('reports/expiring-activities', 'ReportController@expiringActivity')->name('reports.expiring-activity');
  Route::get('reports/expiring-activities-csv', 'ReportController@expiringActivityCsv')->name('reports.expiring-activity-csv');
  Route::get('reports/expiring-activities-excel', 'ReportController@expiringActivityExcel')->name('reports.expiring-activity-excel');
  Route::get('reports/expiring-activities-pdf', 'ReportController@expiringActivityPdf')->name('reports.expiring-activity-pdf');

  Route::get('reports/expired-activities', 'ReportController@expiredActivity')->name('reports.expired-activity');
  Route::get('reports/expired-activities-csv', 'ReportController@expiredActivityCsv')->name('reports.expired-activity-csv');
  Route::get('reports/expired-activities-excel', 'ReportController@expiredActivityExcel')->name('reports.expired-activity-excel');
  Route::get('reports/expired-activities-pdf', 'ReportController@expiredActivityPdf')->name('reports.expired-activity-pdf');

  Route::get('reports/accreditation', 'ReportController@accreditation')->name('reports.accreditation');
  Route::get('reports/accreditation-csv', 'ReportController@accreditationCsv')->name('reports.accreditation-csv');
  Route::get('reports/accreditation-excel', 'ReportController@accreditationExcel')->name('reports.accreditation-excel');
  Route::get('reports/accreditation-pdf', 'ReportController@accreditationPdf')->name('reports.accreditation-pdf');

  Route::get('reports/jac-13', 'Jac13ReportController@index')->name('reports.jac-13');
  Route::get('reports/jac-13-csv', 'Jac13ReportController@csvDownload')->name('reports.jac-13-csv');
  Route::get('reports/jac-13-excel', 'Jac13ReportController@excelDownload')->name('reports.jac-13-excel');
  Route::get('reports/jac-13-pdf', 'Jac13ReportController@pdfDownload')->name('reports.jac-13-pdf');

  Route::get('reports/jac-14', 'Jac14ReportController@index')->name('reports.jac-14');
  Route::get('reports/jac-14-csv', 'Jac14ReportController@csvDownload')->name('reports.jac-14-csv');
  Route::get('reports/jac-14-excel', 'Jac14ReportController@excelDownload')->name('reports.jac-14-excel');
  Route::get('reports/jac-14-pdf', 'Jac14ReportController@pdfDownload')->name('reports.jac-14-pdf');

  Route::get('reports/jac-15', 'Jac15ReportController@index')->name('reports.jac-15');
  Route::get('reports/jac-15-csv', 'Jac15ReportController@csvDownload')->name('reports.jac-15-csv');
  Route::get('reports/jac-15-excel', 'Jac15ReportController@excelDownload')->name('reports.jac-15-excel');
  Route::get('reports/jac-15-pdf', 'Jac15ReportController@pdfDownload')->name('reports.jac-15-pdf');

  Route::get('reports/jac-17', 'Jac17ReportController@index')->name('reports.jac-17');
  Route::get('reports/jac-17-csv', 'Jac17ReportController@csvDownload')->name('reports.jac-17-csv');
  Route::get('reports/jac-17-excel', 'Jac17ReportController@excelDownload')->name('reports.jac-17-excel');
  Route::get('reports/jac-17-pdf', 'Jac17ReportController@pdfDownload')->name('reports.jac-17-pdf');

  Route::get('reports/jac-18', 'Jac18ReportController@index')->name('reports.jac-18');
  Route::get('reports/jac-18-csv', 'Jac18ReportController@csvDownload')->name('reports.jac-18-csv');
  Route::get('reports/jac-18-excel', 'Jac18ReportController@excelDownload')->name('reports.jac-18-excel');
  Route::get('reports/jac-18-pdf', 'Jac18ReportController@pdfDownload')->name('reports.jac-18-pdf');

  Route::get('reports/jac-19', 'Jac19ReportController@index')->name('reports.jac-19');
  Route::get('reports/jac-19-csv', 'Jac19ReportController@csvDownload')->name('reports.jac-19-csv');
  Route::get('reports/jac-19-excel', 'Jac19ReportController@excelDownload')->name('reports.jac-19-excel');
  Route::get('reports/jac-19-pdf', 'Jac19ReportController@pdfDownload')->name('reports.jac-19-pdf');

  Route::get('reports/jac-23', 'Jac23ReportController@index')->name('reports.jac-23');
  Route::get('reports/jac-23-csv', 'Jac23ReportController@csvDownload')->name('reports.jac-23-csv');
  Route::get('reports/jac-23-excel', 'Jac23ReportController@excelDownload')->name('reports.jac-23-excel');
  Route::get('reports/jac-23-pdf', 'Jac23ReportController@pdfDownload')->name('reports.jac-23-pdf');

  Route::get('reports/jac-24', 'Jac24ReportController@index')->name('reports.jac-24');
  Route::get('reports/jac-24-csv', 'Jac24ReportController@csvDownload')->name('reports.jac-24-csv');
  Route::get('reports/jac-24-excel', 'Jac24ReportController@excelDownload')->name('reports.jac-24-excel');
  Route::get('reports/jac-24-pdf', 'Jac24ReportController@pdfDownload')->name('reports.jac-24-pdf');

  Route::get('reports/jac-25', 'Jac25ReportController@index')->name('reports.jac-25');
  Route::get('reports/jac-25-csv', 'Jac25ReportController@csvDownload')->name('reports.jac-25-csv');
  Route::get('reports/jac-25-excel', 'Jac25ReportController@excelDownload')->name('reports.jac-25-excel');
  Route::get('reports/jac-25-pdf', 'Jac25ReportController@pdfDownload')->name('reports.jac-25-pdf');

  /**
   * Weekly Report
   */
  Route::get('weekly-report/status-report', 'StatusReportController@index')->name('status-report.index');
  Route::get('weekly-report/mof-report', 'MofReportController@index')->name('mof-report.index');
  Route::get('weekly-report/mof-report/edit/{id}', 'MofReportController@edit')->name('mof-report.edit');
  Route::post('weekly-report/mof-report/edit/{id}', 'MofReportController@update')->name('mof-report.update');
  Route::get('weekly-report/jac-report', 'JacReportController@index')->name('jac-report.index');

  // Page Resources

  Route::resource('resources', 'ResourceController');
});


Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'role:ADMIN']], function () {

  /**
   * Settings
   */
  Route::get('settings/general-setting', 'SettingController@index')->name('general-setting.index');
  Route::post('settings/general-setting/store', 'SettingController@store')->name('general-setting.store');

  /**
   * Users
   */
  Route::POST('users', 'UserController@store')->name('users.store');

  Route::DELETE('users/{id}', 'UserController@destroy')->name('user.delete');

  /**
   * User Token
   */
  Route::get('users/create', 'UserTokenController@create')->name('usertokens.create');
  Route::POST('usertokens', 'UserTokenController@store')->name('usertokens.store');

  /**
   * Projects
   */

  Route::DELETE('projects/{id}', 'ProjectController@destroy')->name('project.delete');
  Route::PATCH('approve/projects/{project}', 'ProjectApproveController@approve')->name('project.approve');
  Route::PATCH('cancel/projects/{project}', 'ProjectApproveController@cancel')->name('project.cancel');
  Route::PATCH('complete/projects/{project}', 'ProjectApproveController@complete')->name('project.complete');

  /**
   * Mli Activity Outcome
   */
  Route::resource('mli-activity-outcomes', 'MliActivityOutcomeController');
});

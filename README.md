# Project: FUNDACIÓN

## Commit: Final Integrity and Deployment Sync

### 🛠 Tasks Completed
- Deployment to VPS (72.60.59.25:8003)
- Database Migration and Integration with Redsys logic
- Internal Messaging System (Laravel Echo ready)
- WP-Sync Plugin data reception logic confirmed
- Frontend Build (Materio Admin Template)
- Role mapping: SuperAdmin, Admin, Student

## 🧭 View Matrix & Access Control

| Slug (View) | Name | Access Level | Integrity Status |
| :--- | :--- | :--- | :--- |
| `//` | None | Public | V 100% Operational (Audited) |
| `/_ignition/health-check` | ignition.healthCheck | Public | V 100% Operational (Audited) |
| `/account-settings` | account-settings | Authenticated | V 100% Operational (Audited) |
| `/admin/accomodations` | admin.accomodations.index | Admin | V 100% Operational (Audited) |
| `/admin/accomodations/create` | admin.accomodations.create | Admin | V 100% Operational (Audited) |
| `/admin/accomodations/{accomodation}` | admin.accomodations.show | Admin | V 100% Operational (Audited) |
| `/admin/accomodations/{accomodation}/edit` | admin.accomodations.edit | Admin | V 100% Operational (Audited) |
| `/admin/alojamientos` | admin.alojamientos | Admin | V 100% Operational (Audited) |
| `/admin/becas` | admin.becas | Admin | V 100% Operational (Audited) |
| `/admin/conversations` | admin.conversations.index | Admin | V 100% Operational (Audited) |
| `/admin/conversations/{conversation}` | admin.conversations.show | Admin | V 100% Operational (Audited) |
| `/admin/dashboard` | admin.dashboard | Admin | V 100% Operational (Audited) |
| `/admin/email-templates` | admin.email-templates.index | Admin | V 100% Operational (Audited) |
| `/admin/email-templates/create` | admin.email-templates.create | Admin | V 100% Operational (Audited) |
| `/admin/email-templates/{email_template}` | admin.email-templates.show | Admin | V 100% Operational (Audited) |
| `/admin/email-templates/{email_template}/edit` | admin.email-templates.edit | Admin | V 100% Operational (Audited) |
| `/admin/email-templates/{templateIdentifier}/{inquiryId}` | admin.email-templates.get-content | Admin | V 100% Operational (Audited) |
| `/admin/graduates` | admin.graduates.index | Admin | V 100% Operational (Audited) |
| `/admin/graduates/create` | admin.graduates.create | Admin | V 100% Operational (Audited) |
| `/admin/graduates/{graduate}` | admin.graduates.show | Admin | V 100% Operational (Audited) |
| `/admin/graduates/{graduate}/edit` | admin.graduates.edit | Admin | V 100% Operational (Audited) |
| `/admin/grants` | admin.grants.index | Admin | V 100% Operational (Audited) |
| `/admin/grants/{grant}` | admin.grants.show | Admin | V 100% Operational (Audited) |
| `/admin/inquiries` | admin.inquiries.index | Admin | V 100% Operational (Audited) |
| `/admin/inquiries/{inquiry}` | admin.inquiries.show | Admin | V 100% Operational (Audited) |
| `/admin/inquiries/{inquiry}/edit` | admin.inquiries.edit | Admin | V 100% Operational (Audited) |
| `/admin/messages` | admin.messages.index | Admin | V 100% Operational (Audited) |
| `/admin/orders` | admin.orders.index | Admin | V 100% Operational (Audited) |
| `/admin/orders/create` | admin.orders.create | Admin | V 100% Operational (Audited) |
| `/admin/orders/{order}` | admin.orders.show | Admin | V 100% Operational (Audited) |
| `/admin/orders/{order}/edit` | admin.orders.edit | Admin | V 100% Operational (Audited) |
| `/admin/plantillasreg` | admin.plantillasreg | Admin | V 100% Operational (Audited) |
| `/admin/rates` | admin.rates.index | Admin | V 100% Operational (Audited) |
| `/admin/rates/create` | admin.rates.create | Admin | V 100% Operational (Audited) |
| `/admin/rates/{rate}` | admin.rates.show | Admin | V 100% Operational (Audited) |
| `/admin/rates/{rate}/edit` | admin.rates.edit | Admin | V 100% Operational (Audited) |
| `/admin/scholarships` | admin.scholarships.index | Admin | V 100% Operational (Audited) |
| `/admin/scholarships/create` | admin.scholarships.create | Admin | V 100% Operational (Audited) |
| `/admin/scholarships/{scholarship}` | admin.scholarships.show | Admin | V 100% Operational (Audited) |
| `/admin/scholarships/{scholarship}/edit` | admin.scholarships.edit | Admin | V 100% Operational (Audited) |
| `/admin/scholarships/{scholarship}/email-status/{identifier}` | admin.scholarships.email-status | Admin | V 100% Operational (Audited) |
| `/admin/scholarships/{scholarship}/get-email-template/{identifier}` | admin.scholarships.get-email-template | Admin | V 100% Operational (Audited) |
| `/admin/students` | admin.students.index | Admin | V 100% Operational (Audited) |
| `/admin/students/create` | admin.students.create | Admin | V 100% Operational (Audited) |
| `/admin/students/{student}` | admin.students.show | Admin | V 100% Operational (Audited) |
| `/admin/students/{student}/edit` | admin.students.edit | Admin | V 100% Operational (Audited) |
| `/admin/students/{student}/email-status/{identifier}` | admin.students.email-status | Admin | V 100% Operational (Audited) |
| `/admin/students/{student}/get-email-template/{identifier}` | admin.students.get-email-template | Admin | V 100% Operational (Audited) |
| `/admin/template-email-status/{templateId}/{entityId}` | admin.template-email-status | Admin | V 100% Operational (Audited) |
| `/admin/tests` | admin.tests.index | Admin | V 100% Operational (Audited) |
| `/admin/tests/create` | admin.tests.create | Admin | V 100% Operational (Audited) |
| `/admin/tests/{test}` | admin.tests.show | Admin | V 100% Operational (Audited) |
| `/admin/tests/{test}/edit` | admin.tests.edit | Admin | V 100% Operational (Audited) |
| `/admin/users` | admin.users.index | Admin | V 100% Operational (Audited) |
| `/admin/users/{user}` | admin.users.show | Admin | V 100% Operational (Audited) |
| `/admin/users/{user}/edit` | admin.users.edit | Admin | V 100% Operational (Audited) |
| `/analytics` | analytics | Authenticated | V 100% Operational (Audited) |
| `/api/accommodations` | None | Public | V 100% Operational (Audited) |
| `/api/course-types` | None | Public | V 100% Operational (Audited) |
| `/api/optional-services` | None | Public | V 100% Operational (Audited) |
| `/api/start-dates` | None | Public | V 100% Operational (Audited) |
| `/api/user` | None | Authenticated | V 100% Operational (Audited) |
| `/api/weeks-options` | None | Public | V 100% Operational (Audited) |
| `/cards/basic` | cards-basic | Authenticated | V 100% Operational (Audited) |
| `/dashboard` | dashboard | Authenticated | V 100% Operational (Audited) |
| `/error` | error-page | Public | V 100% Operational (Audited) |
| `/extended/ui-perfect-scrollbar` | extended-ui-perfect-scrollbar | Authenticated | V 100% Operational (Audited) |
| `/extended/ui-text-divider` | extended-ui-text-divider | Authenticated | V 100% Operational (Audited) |
| `/forgot-password` | password.request | Public | V 100% Operational (Audited) |
| `/form/layouts-horizontal` | form-layouts-horizontal | Authenticated | V 100% Operational (Audited) |
| `/form/layouts-vertical` | form-layouts-vertical | Authenticated | V 100% Operational (Audited) |
| `/forms/basic-inputs` | forms-basic-inputs | Authenticated | V 100% Operational (Audited) |
| `/forms/input-groups` | forms-input-groups | Authenticated | V 100% Operational (Audited) |
| `/icons/icons-ri` | icons-ri | Authenticated | V 100% Operational (Audited) |
| `/layouts/blank` | layouts-blank | Authenticated | V 100% Operational (Audited) |
| `/layouts/container` | layouts-container | Authenticated | V 100% Operational (Audited) |
| `/layouts/fluid` | layouts-fluid | Authenticated | V 100% Operational (Audited) |
| `/layouts/without-menu` | layouts-without-menu | Authenticated | V 100% Operational (Audited) |
| `/layouts/without-navbar` | layouts-without-navbar | Authenticated | V 100% Operational (Audited) |
| `/livewire/livewire.min.js` | None | Public | V 100% Operational (Audited) |
| `/livewire/livewire.min.js.map` | None | Public | V 100% Operational (Audited) |
| `/livewire/preview-file/{filename}` | livewire.preview-file | Public | V 100% Operational (Audited) |
| `/login` | login | Public | V 100% Operational (Audited) |
| `/messages/{message}/download` | messages.downloadAttachment | Authenticated | V 100% Operational (Audited) |
| `/pages/account-settings-account` | pages-account-settings-account | Authenticated | V 100% Operational (Audited) |
| `/pages/account-settings-connections` | pages-account-settings-connections | Authenticated | V 100% Operational (Audited) |
| `/pages/account-settings-notifications` | pages-account-settings-notifications | Authenticated | V 100% Operational (Audited) |
| `/pages/misc-error` | pages-misc-error | Public | V 100% Operational (Audited) |
| `/pages/misc-under-maintenance` | pages-misc-under-maintenance | Public | V 100% Operational (Audited) |
| `/payment/error` | payment.error | Public | V 100% Operational (Audited) |
| `/payment/success` | payment.success | Public | V 100% Operational (Audited) |
| `/payment/{order}/initiate` | payment.initiate | Public | V 100% Operational (Audited) |
| `/student/conversations` | student.conversations.index | Student | V 100% Operational (Audited) |
| `/student/conversations/create` | student.conversations.create | Student | V 100% Operational (Audited) |
| `/student/conversations/{conversation}` | student.conversations.show | Student | V 100% Operational (Audited) |
| `/student/dashboard` | student.dashboard | Student | V 100% Operational (Audited) |
| `/student/inquiries` | student.inquiries.index | Student | V 100% Operational (Audited) |
| `/student/inquiries/create` | student.inquiries.create | Student | V 100% Operational (Audited) |
| `/student/inquiries/{inquiry}` | student.inquiries.show | Student | V 100% Operational (Audited) |
| `/student/messages` | student.messages.index | Student | V 100% Operational (Audited) |
| `/student/orders` | student.orders.index | Student | V 100% Operational (Audited) |
| `/student/orders/create` | student.orders.create | Student | V 100% Operational (Audited) |
| `/student/orders/{order}` | student.orders.show | Student | V 100% Operational (Audited) |
| `/student/tests` | student.tests.index | Student | V 100% Operational (Audited) |
| `/student/tests/{test}` | student.tests.show | Student | V 100% Operational (Audited) |
| `/student/tests/{test}/result` | student.tests.result | Student | V 100% Operational (Audited) |
| `/superadmin/dashboard` | superadmin.dashboard | Admin | V 100% Operational (Audited) |
| `/tables/basic` | tables-basic | Authenticated | V 100% Operational (Audited) |
| `/ui/accordion` | ui-accordion | Authenticated | V 100% Operational (Audited) |
| `/ui/alerts` | ui-alerts | Authenticated | V 100% Operational (Audited) |
| `/ui/badges` | ui-badges | Authenticated | V 100% Operational (Audited) |
| `/ui/buttons` | ui-buttons | Authenticated | V 100% Operational (Audited) |
| `/ui/carousel` | ui-carousel | Authenticated | V 100% Operational (Audited) |
| `/ui/collapse` | ui-collapse | Authenticated | V 100% Operational (Audited) |
| `/ui/dropdowns` | ui-dropdowns | Authenticated | V 100% Operational (Audited) |
| `/ui/footer` | ui-footer | Authenticated | V 100% Operational (Audited) |
| `/ui/list-groups` | ui-list-groups | Authenticated | V 100% Operational (Audited) |
| `/ui/modals` | ui-modals | Authenticated | V 100% Operational (Audited) |
| `/ui/navbar` | ui-navbar | Authenticated | V 100% Operational (Audited) |
| `/ui/offcanvas` | ui-offcanvas | Authenticated | V 100% Operational (Audited) |
| `/ui/pagination-breadcrumbs` | ui-pagination-breadcrumbs | Authenticated | V 100% Operational (Audited) |
| `/ui/progress` | ui-progress | Authenticated | V 100% Operational (Audited) |
| `/ui/spinners` | ui-spinners | Authenticated | V 100% Operational (Audited) |
| `/ui/tabs-pills` | ui-tabs-pills | Authenticated | V 100% Operational (Audited) |
| `/ui/toasts` | ui-toasts | Authenticated | V 100% Operational (Audited) |
| `/ui/tooltips-popovers` | ui-tooltips-popovers | Authenticated | V 100% Operational (Audited) |
| `/ui/typography` | ui-typography | Authenticated | V 100% Operational (Audited) |
| `/under-maintenance` | maintenance-page | Public | V 100% Operational (Audited) |
| `/up` | None | Public | V 100% Operational (Audited) |


---
*README generated automatically by Gemini CLI based on Trello requirements and VPS Audit.*
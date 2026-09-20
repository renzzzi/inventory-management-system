# Advanced Database Systems (ADS) Project — Inventory Management System

## Project Scope
Based on the client background and approval forms, the system is for **Limpapa National High School** and is intended to replace scattered Excel inventory records and manual item-request logbooks with a unified inventory system. The system should track reusable assets, unreturnable consumables, borrowers/users, transactions, and stock levels. The client expects searchable transaction history and reports for frequently requested supplies, users requesting the most items, and unreturned/stuck-out equipment. The system should also support limited or no internet access and restrict administrative access to the designated system users. fileciteturn0file0L73-L111

---

# Development Checklist

## 1. Project Setup
- [ ] Confirm final project folder structure.
- [ ] Confirm PHP + Tailwind setup.
- [ ] Confirm MySQL database is created.
- [ ] Confirm `config/database.php` connects successfully.
- [ ] Confirm router in `routes/web.php` works.
- [ ] Confirm `public/index.php` correctly dispatches routes.
- [ ] Confirm the application can be opened locally.
- [ ] Remove unnecessary migration/CLI code if it is no longer part of the project.

## 2. Database Design
- [ ] Create `users` / employee profiles table.
- [ ] Create inventory/items table.
- [ ] Add item classification for **returnable** vs **unreturnable/consumable** items.
- [ ] Create borrowing/request/transaction table.
- [ ] Record the user/borrower involved in each transaction.
- [ ] Record item, date, and action type for transactions.
- [ ] Add stock quantity fields and appropriate stock-related constraints.
- [ ] Add status fields needed for borrowed, returned, issued, or available items.
- [ ] Define primary keys and foreign keys.
- [ ] Add appropriate unique constraints.
- [ ] Review relationships between users, items, and transactions.
- [ ] Test insert, update, delete, and retrieval operations.
- [ ] Prepare sample/de-identified data for testing where actual client data is not permitted. The client form emphasizes protecting confidential/personal information and using de-identified, sample, or synthetic data whenever possible. fileciteturn0file0L137-L146

## 3. Authentication and Access Control
- [ ] Create login page.
- [ ] Create login form validation.
- [ ] Implement password hashing with `password_hash()`.
- [ ] Implement password verification with `password_verify()`.
- [ ] Implement PHP sessions.
- [ ] Regenerate the session ID after successful login.
- [ ] Prevent unauthenticated users from accessing protected pages.
- [ ] Implement logout.
- [ ] Restrict administrative functions to authorized system users.
- [ ] Use a generic login error such as `Invalid email or password`.
- [ ] Add CSRF protection to POST forms.
- [ ] Escape displayed user/database values with `htmlspecialchars()`.
- [ ] Validate submitted data server-side.

## 4. Employee/User Management
The client expects profiles for the school's employees and user tracking for supply distribution/accountability. fileciteturn0file0L89-L94

- [ ] Create employee/user list.
- [ ] Create employee/user profile form.
- [ ] Add employee/user.
- [ ] Edit employee/user.
- [ ] View employee/user details.
- [ ] Deactivate/delete employee/user where appropriate.
- [ ] Search/filter employees.
- [ ] Track employee activity/transactions.
- [ ] Identify users with high request/borrowing activity.

## 5. Inventory Management
- [ ] Create inventory list/table.
- [ ] Add new item.
- [ ] Edit item.
- [ ] View item details.
- [ ] Delete/deactivate item where appropriate.
- [ ] Add item name.
- [ ] Add item category.
- [ ] Add quantity/stock level.
- [ ] Add unit of measurement if required.
- [ ] Mark item as returnable or unreturnable/consumable.
- [ ] Add item status.
- [ ] Add search.
- [ ] Add filters.
- [ ] Add low/out-of-stock indication.
- [ ] Make stock levels update when inventory transactions occur.
- [ ] Ensure reusable assets and consumables follow the correct stock/transaction behavior.

## 6. Item Request / Borrowing / Issuing
The proposed system must handle both borrowing of reusable assets and dispensing of unreturnable consumables. fileciteturn0file0L81-L88

- [ ] Create item request form.
- [ ] Select requesting employee/user.
- [ ] Select requested item.
- [ ] Enter quantity.
- [ ] Select/record transaction type.
- [ ] Validate available stock before issuing an item.
- [ ] Prevent issuing more than available stock.
- [ ] Record request date.
- [ ] Record issuing/borrowing action.
- [ ] Update stock after a consumable is issued.
- [ ] Update borrowed status for reusable assets.
- [ ] Record expected/actual return information where applicable.
- [ ] Process returned reusable assets.
- [ ] Restore appropriate stock/availability after return.
- [ ] Record incomplete, overdue, or unreturned items.
- [ ] Maintain a complete transaction history.

## 7. Transaction History
The client specifically expects searchable digital transaction history. fileciteturn0file0L95-L101

- [ ] Create transaction history table.
- [ ] Display user/borrower.
- [ ] Display item.
- [ ] Display date/time.
- [ ] Display action/transaction type.
- [ ] Display quantity.
- [ ] Display status.
- [ ] Add search.
- [ ] Add filters by user.
- [ ] Add filters by item.
- [ ] Add filters by transaction type.
- [ ] Add filters by date range.
- [ ] Add sorting/pagination if needed.
- [ ] Ensure transaction records cannot be accidentally lost when inventory changes.

## 8. Dashboard
- [ ] Create dashboard page.
- [ ] Display total inventory/items.
- [ ] Display available stock.
- [ ] Display borrowed/unreturned reusable assets.
- [ ] Display consumable stock information.
- [ ] Display recent transactions.
- [ ] Display items that need attention.
- [ ] Display high-request users.
- [ ] Display frequently requested supplies.
- [ ] Add quick links to inventory, users, requests, and reports.

## 9. Charts and Visual Reports
The client expects summaries involving frequent users, frequently requested supplies, unreturned/stuck-out equipment, and current stock levels. fileciteturn0file0L95-L101

- [ ] Add chart for most frequent/requesting users.
- [ ] Add chart for most requested supplies/items.
- [ ] Add chart for inventory by category.
- [ ] Add chart/summary for returnable vs unreturnable items.
- [ ] Add stock-level visualization.
- [ ] Add visualization for borrowed/unreturned equipment.
- [ ] Decide which charts belong on the dashboard versus the reports page.
- [ ] Make charts use live database data rather than hardcoded values.
- [ ] Add date/filter controls where useful.

## 10. Reports
- [ ] Create reports page.
- [ ] Report: most frequent item requesters.
- [ ] Report: frequently requested supplies.
- [ ] Report: unreturned/stuck-out equipment.
- [ ] Report: current stock levels.
- [ ] Report: transaction history.
- [ ] Report: borrowing/return activity.
- [ ] Add date-range filtering.
- [ ] Add item/category filtering where applicable.
- [ ] Add employee/user filtering where applicable.
- [ ] Make reports searchable.
- [ ] Add print-friendly report layout.
- [ ] If required by the instructor, add export functionality after the core reports work.

## 11. Tables and CRUD Pages
### Users / Employees
- [ ] List table
- [ ] Add form
- [ ] Edit form
- [ ] View/details page
- [ ] Delete/deactivate action
- [ ] Search/filter

### Inventory
- [ ] List table
- [ ] Add form
- [ ] Edit form
- [ ] View/details page
- [ ] Delete/deactivate action
- [ ] Search/filter

### Requests / Transactions
- [ ] List table
- [ ] Request/issue form
- [ ] Return action
- [ ] View transaction details
- [ ] Search/filter
- [ ] Status display

## 12. UI / Tailwind
- [ ] Create consistent navigation/sidebar.
- [ ] Create dashboard layout.
- [ ] Create consistent table styling.
- [ ] Create consistent forms.
- [ ] Add buttons for CRUD actions.
- [ ] Add confirmation prompts for destructive actions.
- [ ] Add success/error messages.
- [ ] Add empty-state messages when tables have no records.
- [ ] Make pages usable on the target screen sizes.
- [ ] Keep the interface simple enough for the designated administrative users.

## 13. Router / MVC
- [ ] Add all GET routes to `routes/web.php`.
- [ ] Add all POST routes to `routes/web.php`.
- [ ] Create corresponding controllers.
- [ ] Create corresponding models.
- [ ] Create corresponding views.
- [ ] Verify every route points to an existing controller/action.
- [ ] Verify controllers load the correct views.
- [ ] Keep database queries inside models rather than views.
- [ ] Keep business/request logic inside controllers rather than views.
- [ ] Keep HTML/Tailwind presentation inside views.

## 14. Security and Validation
- [ ] Use PDO prepared statements for database queries.
- [ ] Never concatenate untrusted input directly into SQL.
- [ ] Hash passwords.
- [ ] Verify passwords securely.
- [ ] Protect authenticated routes.
- [ ] Add CSRF tokens to state-changing forms.
- [ ] Validate all submitted data server-side.
- [ ] Escape output.
- [ ] Prevent unauthorized access to administrative functions.
- [ ] Avoid exposing database errors to normal users.
- [ ] Use sample/de-identified data for development unless the client gives appropriate permission.

## 15. Limited/No Internet Requirement
The client states that the system must function with limited or no internet access because of the school's remote location. fileciteturn0file0L102-L107

- [ ] Test the application on a local network/offline environment.
- [ ] Avoid features that require constant external internet access.
- [ ] Confirm the database works locally.
- [ ] Confirm all core CRUD functions work without external services.
- [ ] If using Tailwind CDN during development, replace it with a local Tailwind build before final offline testing.
- [ ] Test the system with internet disconnected.

## 16. Testing
### Authentication
- [ ] Correct login works.
- [ ] Incorrect password is rejected.
- [ ] Unknown account is rejected.
- [ ] Logout works.
- [ ] Protected pages cannot be opened while logged out.

### Inventory
- [ ] Add item works.
- [ ] Edit item works.
- [ ] Delete/deactivate works.
- [ ] Search works.
- [ ] Stock updates correctly.

### Requests / Borrowing
- [ ] Valid request works.
- [ ] Insufficient stock is rejected.
- [ ] Consumable issuance decreases stock.
- [ ] Reusable asset borrowing changes availability/status.
- [ ] Returning an asset updates its status.
- [ ] Unreturned items appear correctly.

### Reports
- [ ] User/requester report is correct.
- [ ] Frequently requested item report is correct.
- [ ] Unreturned item report is correct.
- [ ] Stock report is correct.
- [ ] Transaction history is correct.
- [ ] Filters produce correct results.
- [ ] Charts match the underlying database data.

## 17. Client Validation
The approval form permits consultation, workflow observation, review of blank/sample reports, validation of entities/fields/relationships, and review of prototype/final output. fileciteturn0file0L150-L158

- [ ] Conduct requirements interview.
- [ ] Confirm actual inventory workflow.
- [ ] Confirm what counts as a reusable asset.
- [ ] Confirm what counts as a consumable.
- [ ] Confirm required employee/user information.
- [ ] Confirm request/borrowing process.
- [ ] Confirm return process.
- [ ] Confirm report requirements.
- [ ] Confirm dashboard information.
- [ ] Validate database entities and relationships with client.
- [ ] Show prototype screens to client.
- [ ] Gather client feedback.
- [ ] Apply approved changes.
- [ ] Obtain final project/output feedback.

## 18. Final Submission
- [ ] Finalize database structure.
- [ ] Finalize application features.
- [ ] Remove test/debug output.
- [ ] Check all routes.
- [ ] Check all forms.
- [ ] Check all tables.
- [ ] Check all charts.
- [ ] Check all reports.
- [ ] Check authentication/security.
- [ ] Test the complete workflow from login to report generation.
- [ ] Prepare sample/de-identified dataset.
- [ ] Prepare database backup/export if required.
- [ ] Prepare project documentation.
- [ ] Prepare screenshots for documentation/presentation.
- [ ] Prepare system demonstration.
- [ ] Confirm final scope with instructor/client as required.

---

# Suggested Completion Order

Use this order so features are built on top of working foundations:

1. [ ] Project structure + router
2. [ ] MySQL database + relationships
3. [ ] Login/logout + authentication
4. [ ] Employee/user management
5. [ ] Inventory CRUD
6. [ ] Item request/issuing
7. [ ] Borrowing and returns
8. [ ] Transaction history
9. [ ] Dashboard
10. [ ] Charts
11. [ ] Reports
12. [ ] UI polish
13. [ ] Security review
14. [ ] Full testing
15. [ ] Client validation
16. [ ] Final documentation and presentation

## Core MVP

Before spending time on visual polish, make sure these are working:

- [ ] Login
- [ ] Dashboard
- [ ] Employee/user records
- [ ] Inventory records
- [ ] Item requests
- [ ] Borrowing/returning reusable assets
- [ ] Dispensing consumables
- [ ] Automatic stock updates
- [ ] Transaction history
- [ ] Search/filter
- [ ] Required reports
- [ ] Required charts
- [ ] Authentication and access control

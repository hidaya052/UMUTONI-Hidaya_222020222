# Individual Web Development Project

## Student Information
| Detail | Information |
|--------|-------------|
| **Name** | [Your Full Name] |
| **Registration Number** | [Your Reg Number] |
| **Course** | Internet and Web Technologies |
| **Submission Date** | April 18, 2026 |

---

## Project Overview

This project contains two web applications developed as part of the Individual CAT assessment:

1. **Currency Converter Application** - A JavaScript-based currency conversion tool
2. **Qualification Form** - A student qualification submission form with database storage

---

## Project 1: Currency Converter

### Description
A simple web-based currency converter that allows users to convert amounts between different currencies.

### Features
- Input field for entering amount in FRW
- Dropdown menu to select target currency (USD, EURO)
- Field to enter custom exchange rate
- Real-time currency conversion
- Displays converted amount instantly

### Technologies Used
- HTML5 for structure
- CSS3 for styling
- JavaScript for conversion logic

### How to Use
1. Enter the amount in FRW
2. Select the target currency
3. Enter the current exchange rate
4. Click the "CONVERT" button
5. View the converted amount

---

## Project 2: Qualification Form

### Description
A qualification submission form that stores student educational information in a MySQL database.

### Features
- Table for entering educational qualifications (Class X, XII, Graduation, Masters)
- Radio buttons for course selection (BCA, B.Com, B.Sc, B.A)
- Form validation
- Data storage in database
- Success confirmation page

### Technologies Used
- HTML5 for form structure
- CSS3 for styling
- PHP for server-side processing
- MySQL for database storage

### Database Structure

```sql
CREATE TABLE qualifications (
    id INT AUTO_INCREMENT PRIMARY KEY,
    board10 VARCHAR(10),
    percentage10 DECIMAL(5,2),
    year10 VARCHAR(4),
    board12 VARCHAR(10),
    percentage12 DECIMAL(5,2),
    year12 VARCHAR(4),
    boardgrad VARCHAR(10),
    percentagegrad DECIMAL(5,2),
    yeargrad VARCHAR(4),
    boardmaster VARCHAR(10),
    percentagemaster DECIMAL(5,2),
    yearmaster VARCHAR(4),
    course VARCHAR(10),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

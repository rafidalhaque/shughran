---
layout: page
title: Account Creation Guide
parent: User Guides
nav_order: 1
---

# Account Creation Guide

This guide explains how to create different types of user accounts in the Shughran application for organizational management.

## Overview

The Shughran application supports multiple user roles and organizational structures. Accounts can be created for different organizational levels and roles.

## User Roles and Permissions

### Primary User Groups
1. **Owner** - Full system access and control
2. **Admin** - Administrative access with some restrictions  
3. **Customer** - Limited access for external users
4. **Supplier** - Limited access for supplier management

### Permission Levels
- **View Rights**: 
  - All Records - Can view all organizational data
  - Own Records - Can only view own associated data
- **Edit Rights**: 
  - Yes - Can modify data
  - No - Read-only access

## Prerequisites

- You must be logged in as an **Owner** to create new user accounts
- Only Owners have permission to access the user creation interface
- You need to have the target branch and department information ready

## Creating User Accounts

### Step 1: Access User Creation

1. Login to the admin panel as an Owner
2. Navigate to the user management section
3. Click on "Create User" option

### Step 2: Fill User Information

#### Basic Information
- **First Name**: User's first name (required, 1-20 characters)
- **Last Name**: User's last name (optional)
- **Gender**: Select male or female (required)
- **Company**: Organization or company name (required, can use "-" if not applicable)
- **Phone**: Contact phone number (required)
- **Email**: Valid email address (required, must be unique)
- **Username**: Login username (required, 4-20 characters, must be unique)

#### Security Information
- **Password**: Must meet requirements:
  - At least 8 characters
  - Contains at least one digit
  - Contains at least one lowercase letter
  - Contains at least one uppercase letter
- **Confirm Password**: Must match the password field

#### Account Settings
- **Status**: 
  - Active - User can login immediately
  - Inactive - User account is disabled
- **Group**: Select user role (excludes customer and supplier from dropdown)
- **Branch**: Select the organizational branch (optional)
- **Department**: Select the department within the branch (optional)
- **View Right**: Choose between "All Records" or "Own Records"
- **Edit Right**: Choose "Yes" or "No" for editing permissions

### Step 3: Submit and Verify

1. Click the submit button to create the account
2. The system will validate all information
3. If successful, you'll be redirected to the users list
4. The new user will receive account details (if notification is enabled)

## Creating Admin Accounts

### For System Administrators

1. **Follow the standard account creation process**
2. **Set the Group to "Admin"** (or appropriate admin group)
3. **Configure permissions**:
   - View Right: Usually "All Records" for admins
   - Edit Right: Usually "Yes" for admins
4. **Branch Assignment**: 
   - Leave blank for system-wide admin access
   - Select specific branch for branch-limited admin
5. **Department**: Assign relevant department if needed

### Admin Account Characteristics
- Can access administrative functions
- May have branch-specific or system-wide access
- Cannot create other admin accounts (only Owners can)
- Access level depends on view/edit rights configuration

## Creating Branch Accounts

### Understanding Branch Structure

The application supports a hierarchical organizational structure:
- **Main Branches**: Primary organizational units
- **Sub-branches**: Secondary units within main branches
- **Departments**: Functional divisions within branches

### For Branch-Level Users

1. **Follow the standard account creation process**
2. **Branch Selection**: Choose the specific branch
3. **Role Assignment**: 
   - Admin role for branch administrators
   - Regular user role for branch staff
4. **Permissions Configuration**:
   - View Right: "All Records" for branch-wide access, "Own Records" for limited access
   - Edit Right: Based on user responsibilities
5. **Department Assignment**: Select relevant department within the branch

### Branch Account Features
- Access limited to assigned branch data
- Can manage branch-specific information
- View and edit rights apply within branch scope
- May have access to branch reporting functions

## Creating Sub-Branch Accounts

### Sub-Branch Account Setup

Sub-branches are organizational units that operate under main branches. The process is similar to branch accounts but with additional considerations:

1. **Follow the standard account creation process**
2. **Branch Hierarchy**: 
   - Select the parent branch first
   - Choose appropriate sub-branch or unit
3. **Access Scope**:
   - Usually more limited than main branch accounts
   - Focus on specific organizational units or geographical areas
4. **Permission Strategy**:
   - View Right: Often "Own Records" to limit access to sub-branch data
   - Edit Right: Based on operational needs

### Sub-Branch Characteristics
- Inherits structure from parent branch
- May have additional geographical or institutional constraints
- Access to specialized reporting for sub-unit activities
- Can manage ward, union, and institutional data within scope

## Organizational Hierarchy Support

### Geographic Levels
The system supports multiple administrative levels:
1. **District** - Primary geographical division
2. **Upazila** - Sub-district level
3. **Union** - Local administrative unit
4. **Ward** - Smallest administrative unit

### Institutional Levels
- **Institution Categories** - Primary institution types
- **Sub-categories** - Specialized institution types
- **Institution Lists** - Specific institution entries

## Account Validation and Security

### Automatic Validations
- **Email uniqueness**: System prevents duplicate email addresses
- **Username uniqueness**: System prevents duplicate usernames
- **Password strength**: Enforced password complexity requirements
- **Required fields**: All mandatory fields must be completed

### Security Features
- **Password hashing**: Passwords are securely hashed before storage
- **Role-based access**: Users can only access functions appropriate to their role
- **Branch isolation**: Users typically cannot access other branch data
- **Session management**: Secure login/logout handling

## Post-Creation Steps

### After Account Creation

1. **Verify account details** in the user list
2. **Test login functionality** with the new account
3. **Confirm access permissions** are working correctly
4. **Provide login credentials** to the user securely
5. **Brief the user** on their access scope and responsibilities

### Account Management

- **Status changes**: Owners can activate/deactivate accounts
- **Permission updates**: Modify view and edit rights as needed
- **Branch transfers**: Update branch assignments when necessary
- **Role changes**: Modify user groups when organizational needs change

## Common Issues and Solutions

### Account Creation Failures

**Issue**: "Email already exists"
- **Solution**: Use a different email address or check if user already exists

**Issue**: "Username already taken"
- **Solution**: Choose a different username (4-20 characters)

**Issue**: "Password requirements not met"
- **Solution**: Ensure password has uppercase, lowercase, digit, and minimum 8 characters

**Issue**: "Access denied"
- **Solution**: Verify you are logged in as an Owner

### Permission Issues

**Issue**: User cannot access expected features
- **Solution**: Check user group, branch assignment, and view/edit rights

**Issue**: User sees too much or too little data
- **Solution**: Review view rights setting (All Records vs Own Records)

## Best Practices

### Account Creation Strategy

1. **Plan user roles** before creating accounts
2. **Use consistent naming** conventions for usernames
3. **Document access levels** for each user type
4. **Test accounts** before providing to users
5. **Regular access reviews** to ensure appropriate permissions

### Security Recommendations

1. **Strong passwords**: Enforce password complexity
2. **Principle of least privilege**: Grant minimum necessary access
3. **Regular audits**: Review user accounts periodically
4. **Timely deactivation**: Disable accounts when users leave
5. **Secure credential sharing**: Use secure methods to share login details

### Organizational Structure

1. **Clear hierarchy**: Establish clear branch and department structure
2. **Logical assignments**: Assign users to appropriate organizational units
3. **Consistent permissions**: Use consistent permission patterns for similar roles
4. **Documentation**: Maintain records of organizational assignments

## Support and Troubleshooting

If you encounter issues during account creation:

1. **Check system logs** for error details
2. **Verify form validation** messages
3. **Confirm user permissions** for account creation
4. **Review organizational setup** (branches, departments, groups)
5. **Contact system administrator** if problems persist

---

**Note**: This guide assumes you have appropriate administrative privileges and understanding of your organizational structure. Always test new accounts in a safe environment before deploying to production use.
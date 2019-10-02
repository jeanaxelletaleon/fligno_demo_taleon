*** Settings ***
Documentation       Edit Record
Library             SeleniumLibrary
Resource            ../Resources/open_browser.robot
Resource            ../Resources/bad_path/res_edit_record.robot
Test Teardown       Close Browser


*** Variables ***
${homeURL}    http://127.0.0.1:8000/index
${BROWSER}    chrome

*** Test Cases ***
Scenario: Check response when empty form is submitted when updated, and enter invalid Phone Number and Birthdate.
    Given user is in "http://127.0.0.1:8000/index"
    And user clicks 'Edit' button on any of the present record
    And user clear all text fields
    When user clicks 'Save' button
    Then user should see a form validation
    And user input a text on Birthdate field
    And user input a text on Phone field
    When user clicks 'Save' button
    Then user should see a form validation for Birthdate and Phone
*** Settings ***
Documentation       Add New Record
Library             SeleniumLibrary
Resource            ../Resources/open_browser.robot
Resource            ../Resources/bad_path/res_add_new_record.robot
Test Teardown       Close Browser


*** Variables ***
${homeURL}    http://127.0.0.1:8000/index
${BROWSER}    chrome

*** Test Cases ***
Scenario: Check response when empty form is submitted and enter invalid Phone Number and Birthdate.
    Given user is in "http://127.0.0.1:8000/index"
    And user clicks 'Create Record' button
    And user leave all fields blank
    When user clicks 'Add' button
    Then user should see a form validation 
    And user input a text on Birthdate field
    And user input a text on Phone field
    When user clicks 'Add' button
    Then user should see a form validation for Birthdate and Phone
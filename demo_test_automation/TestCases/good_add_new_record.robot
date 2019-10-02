*** Settings ***
Documentation       Add New Record
Library             SeleniumLibrary
Resource            ../Resources/open_browser.robot
Resource            ../Resources/good_path/res_add_new_record.robot
Test Teardown       Close Browser


*** Variables ***
${homeURL}    http://127.0.0.1:8000/index
${BROWSER}    chrome

*** Test Cases ***
Scenario: Check if user can successfully add new record.
    Given user is in "http://127.0.0.1:8000/index"
    And user clicks 'Create Record' button
    And user fill out the form
    When user clicks 'Add' button
    Then user should see a success message

*** Settings ***
Documentation       Edit Record
Library             SeleniumLibrary
Resource            ../Resources/open_browser.robot
Resource            ../Resources/good_path/res_edit_record.robot
Test Teardown       Close Browser


*** Variables ***
${homeURL}    http://127.0.0.1:8000/index
${BROWSER}    chrome

*** Test Cases ***
Scenario: Check if user can successfully update a record.
    Given user is in "http://127.0.0.1:8000/index"
    And user clicks 'Edit' button on any of the present record
    And user made some changes
    When user clicks 'Save' button
    Then user should see a success message 
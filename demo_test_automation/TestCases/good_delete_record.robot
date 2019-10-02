*** Settings ***
Documentation       Delete Record
Library             SeleniumLibrary
Resource            ../Resources/open_browser.robot
Resource            ../Resources/good_path/res_delete_record.robot
Test Teardown       Close Browser


*** Variables ***
${homeURL}    http://127.0.0.1:8000/index
${BROWSER}    chrome

*** Test Cases ***
Scenario: Check if user can successfully delete a record.
    Given user is in "http://127.0.0.1:8000/index"
    And user clicks 'Delete' button on any of the present record
    And confirmation message shows
    When user clicks 'OK' button
    Then user should see success message
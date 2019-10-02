*** Settings ***
Documentation       View Record
Library             SeleniumLibrary
Resource            ../Resources/open_browser.robot
Resource            ../Resources/good_path/res_view_record.robot
Test Teardown       Close Browser


*** Variables ***
${homeURL}    http://127.0.0.1:8000/index
${BROWSER}    chrome

*** Test Cases ***
Scenario: Check if user can successfully view a record.
    Given user is in "http://127.0.0.1:8000/index"
    When user clicks 'View' button on any of the present record
    Then user will be redirected to "http://127.0.0.1:8000/index/id"
    And user scrolls down
    When user clicks 'Back' button
    Then user will be redirected to "http://127.0.0.1:8000/index"
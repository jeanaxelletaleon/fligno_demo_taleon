*** Settings ***
Documentation       Search Record
Library             SeleniumLibrary
Resource            ../Resources/open_browser.robot
Resource            ../Resources/bad_path/res_search_record.robot
Test Teardown       Close Browser


*** Variables ***
${homeURL}    http://127.0.0.1:8000/index
${BROWSER}    chrome

*** Test Cases ***
Scenario: Check response when non-existing name is searched.
    Given user is in "http://127.0.0.1:8000/index"
    And user enters a non-existing name to search
    When user wait for the result to show
    Then user should see a no matching record message
*** Settings ***
Documentation   Search record
Library         SeleniumLibrary
Library         BuiltIn
Library         FakerLibrary

*** Variables ***
${homeURL}      http://127.0.0.1:8000/index
${BROWSER}      chrome
${search_name} =       non-existing name

*** Keywords ***
And user enters a non-existing name to search
    Click Element                   xpath=//*[@id="user_table_filter"]/label/input
    Input text                      //*[@id="user_table_filter"]/label/input            ${search_name}
    Sleep   5

When user wait for the result to show
    Wait Until Page Contains        No matching records found

Then user should see a no matching record message
    Page Should Contain             No matching records found
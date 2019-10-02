*** Settings ***
Documentation   Add New Record
Library         SeleniumLibrary
Library         BuiltIn

*** Variables ***
${homeURL}      http://127.0.0.1:8000/index
${BROWSER}      chrome
${text} =       test

*** Keywords ***
user clicks 'Create Record' button
    Click element                   //*[@id="create_record"]

user leave all fields blank
    Sleep   3
    Scroll element into view        //*[@id="action_button"]

user input a text on Birthdate field
    Sleep   2                       
    Input text                      //*[@id="birthdate"]      ${text}                  

user input a text on Phone field
    Input text                      //*[@id="phone"]          ${text}
    Sleep   3
    Scroll element into view        //*[@id="action_button"]    

user clicks 'Add' button
    Click element                   //*[@id="action_button"]
    Sleep   2
    Scroll element into view        xpath=//*[@id="formModal"]/div/div/div[1]/h4
    Sleep   5

user should see a form validation
    Wait Until Page Contains        field is required.
    Sleep   3
    Page Should Contain             field is required.

user should see a form validation for Birthdate and Phone
    Wait Until Page Contains        The birthdate does not match the format Y-m-d.
    Wait Until Page Contains        The phone must be a number.
    Sleep   3
    Page Should Contain             The birthdate does not match the format Y-m-d.
    Page Should Contain             The phone must be a number.
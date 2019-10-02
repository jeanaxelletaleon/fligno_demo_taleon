*** Settings ***
Documentation   Edit Record
Library         SeleniumLibrary
Library         BuiltIn

*** Variables ***
${homeURL}      http://127.0.0.1:8000/index
${BROWSER}      chrome
${text} =       test

*** Keywords ***
user clicks 'Edit' button on any of the present record
    Click element                   //*[@name="edit"]

user clear all text fields
    Sleep   3
    Clear Element Text              //*[@id="firstname"]      
    Clear Element Text              //*[@id="middlename"]    
    Clear Element Text              //*[@id="lastname"]       
    Clear Element Text              //*[@id="birthdate"]      
    Clear Element Text              //*[@id="phone"]  

    Scroll element into view        //*[@id="action_button"]
    Clear Element Text              //*[@id="address"]        
    Sleep   2               

user input a text on Birthdate field                       
    Input text                      //*[@id="birthdate"]      ${text}                  

user input a text on Phone field
    Input text                      //*[@id="phone"]          ${text}
    Sleep   2
    Scroll element into view        //*[@id="action_button"]    

user clicks 'Save' button
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

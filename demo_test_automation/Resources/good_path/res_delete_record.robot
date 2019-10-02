*** Settings ***
Documentation   Delete Record
Library         SeleniumLibrary

*** Variables ***
${homeURL}      http://127.0.0.1:8000/index
${BROWSER}      chrome

*** Keywords ***
user clicks 'Delete' button on any of the present record
    Click element                           //*[@name="delete"]
    Sleep   3
    Wait Until Page Contains                Confirmation

confirmation message shows
    Page Should Contain                     Confirmation

user clicks 'OK' button
    Wait Until Element is Enabled           //*[@name="ok_button"]
    Sleep   3
    Click Element                           //*[@name="ok_button"]
    Sleep   7
    Wait Until Page Contains                Record has been successfully deleted.

user should see success message
    Page Should Contain                     Record has been successfully deleted.


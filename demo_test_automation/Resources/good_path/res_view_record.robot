*** Settings ***
Documentation   View Record
Library         SeleniumLibrary

*** Variables ***
${homeURL}      http://127.0.0.1:8000/index
${BROWSER}      chrome

*** Keywords ***
user clicks 'View' button on any of the present record
    Click element                       //*[@name="view"]

user will be redirected to "http://127.0.0.1:8000/index/id"
    Sleep   2
    Wait Until Page Contains            Personal Information Record Details
    Sleep   3
    Page Should Contain                 Personal Information Record Details

user scrolls down
    Sleep   2
    Scroll Element Into View            xpath=/html/body/div/div[10]/a
    Sleep   2

user clicks 'Back' button
    Click Element                       xpath=/html/body/div/div[10]/a
    Sleep   2

user will be redirected to "http://127.0.0.1:8000/index"
    Sleep   2
    Wait Until Page Contains            Personal Information Records
    Sleep   3
    Page Should Contain                 Personal Information Records



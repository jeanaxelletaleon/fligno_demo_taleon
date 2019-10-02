*** Settings ***
Documentation   Opens a browser to main page URL and checks that the page is open.
Library         SeleniumLibrary
Library         OperatingSystem

*** Variables ***
${homeURL}      http://127.0.0.1:8000/index
${BROWSER}      chrome


*** Keywords ***
user is in "http://127.0.0.1:8000/index"
    Open Browser                        ${homeURL}          ${BROWSER}
    Maximize Browser Window
    Wait Until Page Contains            Personal Information Records
    Sleep   5

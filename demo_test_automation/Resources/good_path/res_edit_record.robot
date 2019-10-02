*** Settings ***
Documentation   Edit Record
Library         SeleniumLibrary
Library         BuiltIn
Library         FakerLibrary

*** Variables ***
${homeURL}      http://127.0.0.1:8000/index
${BROWSER}      chrome

*** Keywords ***
user clicks 'Edit' button on any of the present record
    Click element                   //*[@name="edit"]

user made some changes
    ${phone_number} =               FakerLibrary.Random Number          9
    ${address} =                    FakerLibrary.Address

    Sleep   3
    Input text                      //*[@id="phone"]                          ${phone_number}

    Sleep   3
    Scroll element into view        //*[@id="action_button"]
    Input text                      //*[@id="address"]                        ${address}
    Sleep   2

user clicks 'Save' button
    Click element                   //*[@id="action_button"]
    Sleep   2
    Scroll element into view        xpath=//*[@id="formModal"]/div/div/div[1]/h4
    Sleep   5
    Wait Until Page Contains        Record has been successfully updated.

user should see a success message
    Page Should Contain             Record has been successfully updated.


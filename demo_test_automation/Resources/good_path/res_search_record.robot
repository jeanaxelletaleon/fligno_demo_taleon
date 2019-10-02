*** Settings ***
Documentation   Search Record
Library         SeleniumLibrary
Library         BuiltIn
Library         FakerLibrary
Library         String

*** Variables ***
${homeURL}      http://127.0.0.1:8000/index
${BROWSER}      chrome

*** Keywords ***
user enters a name to search
    ${countrow}=        Get Element count           //*[@id="user_table"]/tbody/tr
    ${rndrow}           Random Int                  min=1       max=${countrow}
    ${rnddata}          Random Int                  min=1       max=3
    ${query}=           Get text                    xpath=//*[@id="user_table"]/tbody/tr[${rndrow}]/td[${rnddata}]
    Sleep       3
    Input text          xpath=//*[@id="user_table_filter"]/label/input        ${query}
    Sleep       2

user wait for the result to show
    Wait Until Page Contains Element        xpath=//*[@id="user_table"]/tbody/tr


user should see a correct search result
    Page Should Contain Element             xpath=//*[@id="user_table"]/tbody/tr
    Sleep   5
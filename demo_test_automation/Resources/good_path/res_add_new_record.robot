*** Settings ***
Documentation   Add New Record
Library         SeleniumLibrary
Library         BuiltIn
Library         FakerLibrary
Library         String

*** Variables ***
${homeURL}      http://127.0.0.1:8000/index
${BROWSER}      chrome

*** Keywords ***
user clicks 'Create Record' button
    Click element                   //*[@id="create_record"]

user fill out the form
    ${first_name} =             FakerLibrary.First Name
    ${middle_name} =            FakerLibrary.Last Name
    ${last_name} =              FakerLibrary.Last Name
    ${birthdate} =              FakerLibrary.Date
    ${phone_number} =           FakerLibrary.Random Number          9              
    ${address} =                FakerLibrary.Address
    ${about_me} =               FakerLibrary.Paragraphs

    Sleep   3

    Input text                      //*[@id="firstname"]      ${first_name}
    Input text                      //*[@id="middlename"]     ${middle_name}
    Input text                      //*[@id="lastname"]       ${last_name}
    Sleep   3

    ${rndgender}                    Random Int                      min=0                   max=1 
    #return a string representing the specified number object                  
    ${slctrndgender}                Convert To String         ${rndgender}
    Select from list by index       //*[@name="gender"]       ${slctrndgender}

    Sleep   3
    Input text                      //*[@id="birthdate"]      ${birthdate}

    Sleep   3
    Input text                      //*[@id="phone"]          ${phone_number}

    Sleep   3
    Scroll element into view        //*[@id="action_button"]
    Input text                      //*[@id="address"]        ${address}
    Sleep   2
    Input text                      //*[@id="about"]          ${about_me}

    # Select from list by index           //*[@name="gender"]               1
    Sleep   2
    Select Radio Button             marital                         married
    Sleep   2
    Select Checkbox                 xpath=//*[@id="sample_form"]/div[10]/div/label[1]/input
    Select Checkbox                 xpath=//*[@id="sample_form"]/div[10]/div/label[3]/input

    Sleep   2

user clicks 'Add' button
    Click element                   //*[@id="action_button"]
    Scroll element into view        xpath=//*[@id="formModal"]/div/div/div[1]/h4
    Sleep   5
    Wait Until Page Contains        New record has been successfully added.

user should see a success message
    Page Should Contain             New record has been successfully added.


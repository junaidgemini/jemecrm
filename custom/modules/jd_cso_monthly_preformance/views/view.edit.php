<?php
if (!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');

class jd_cso_monthly_preformanceViewEdit extends ViewEdit

{
    public function display()
    {
        parent::display();

        // Fetch the saved state and branch values
        $savedState = isset($this->bean->jd_cso_branch_state) ? $this->bean->jd_cso_branch_state : ''; // Replace 'state_c' with your actual field name
        $savedBranch = isset($this->bean->jd_cso_branch) ? $this->bean->jd_cso_branch : ''; // Replace 'branch_c' with your actual field name

        // Pass these values to the frontend using Smarty
        $this->ss->assign('JD_CSO_BRANCH_STATE', $savedState);
        $this->ss->assign('JD_CSO_BRANCH', $savedBranch);

        // Add custom JS for dropdown dependency
        echo '<script type="text/javascript">
            $(document).ready(function() {
            console.log("Custom JS for Tasks is loaded.");


               // Simulate the onchange event of the state dropdown to filter branches
                // const stateDropdown = document.getElementById("jd_cso_branch_state");
                // if (stateDropdown) {
                //     stateDropdown.dispatchEvent(new Event("change"));
                // }

                const stateField = document.getElementById("jd_cso_branch_state");
                const branchField = document.getElementById("jd_cso_branch");



                const savedState = "{JD_CSO_BRANCH_STATE}";
                const savedBranch = "{JD_CSO_BRANCH}";

                const stateDropdown = document.getElementById("jd_cso_branch_state");
                const branchDropdown = document.getElementById("jd_cso_branch");

                // if (stateDropdown && branchDropdown) {
                //     // Pre-select the saved state
                //     if (savedState) {
                //         stateDropdown.value = savedState;
                //         // Trigger the change event to load branches
                //         stateDropdown.dispatchEvent(new Event("change"));
                //     }

                //     // Pre-select the saved branch
                //     if (savedBranch) {
                //         setTimeout(() => {
                //             branchDropdown.value = savedBranch;
                //         }, 100); // Small delay to ensure branches are loaded
                //     }
                // }


                const branchOptions = {
                    "":[
                    { "key": "SE_Imo_Orlu", "value": "Orlu" },
                        { "key": "SE_Imo_Amakohia", "value": "Amakohia" },
                        { "key": "SE_Imo_Wetheral", "value": "Wetheral" },
                        { "key": "SE_Imo_Okigwe", "value": "Okigwe" },
                        { "key": "SE_Imo_Mbaise", "value": "Mbaise" },
                        { "key": "SE_Imo_Douglas", "value": "Douglas" },
                        { "key": "SE_Imo_Ideato_South", "value": "Ideato South" },
                        { "key": "SE_Imo_Oreagu", "value": "Oreagu" },
                        { "key": "SE_Imo_Obinze", "value": "Obinze" },
                        { "key": "SE_Imo_South_East", "value": "South East Zonal Office" },
                        { "key": "SE_Abia_Asa", "value": "Asa" },
                        { "key": "SE_Abia_Faulks", "value": "Faulks" },
                        { "key": "SE_Abia_Uzuaokoli", "value": "Uzuaokoli" },
                        { "key": "SE_Abia_Ohafia", "value": "Ohafia" },
                        { "key": "SE_Abia_Isuochi", "value": "Isuochi" },
                        { "key": "SE_Abia_Abriba", "value": "Abriba" },
                        { "key": "SE_Abia_Isikwato", "value": "Isikwato" },
                        { "key": "SE_Abia_Ubakala", "value": "Ubakala" },
                        { "key": "SE_Abia_Osisioma", "value": "Osisioma" },
                        { "key": "SE_Abia_Ariaria", "value": "Ariaria" },
                        { "key": "SE_Abia_Arochukwu", "value": "Arochukwu" },
                        { "key": "SE_Abia_Flyover", "value": "Flyover" },
                        { "key": "SE_Abia_Aba", "value": "Aba" }
                    ],    

                     "Imo": [
                        { "key": "SE_Imo_Orlu", "value": "Orlu" },
                        { "key": "SE_Imo_Amakohia", "value": "Amakohia" },
                        { "key": "SE_Imo_Wetheral", "value": "Wetheral" },
                        { "key": "SE_Imo_Okigwe", "value": "Okigwe" },
                        { "key": "SE_Imo_Mbaise", "value": "Mbaise" },
                        { "key": "SE_Imo_Douglas", "value": "Douglas" },
                        { "key": "SE_Imo_Ideato_South", "value": "Ideato South" },
                        { "key": "SE_Imo_Oreagu", "value": "Oreagu" },
                        { "key": "SE_Imo_Obinze", "value": "Obinze" },
                        { "key": "SE_Imo_South_East", "value": "South East Zonal Office" }],
                    
                    "Abia": [
                        { "key": "SE_Abia_Asa", "value": "Asa" },
                        { "key": "SE_Abia_Faulks", "value": "Faulks" },
                        { "key": "SE_Abia_Uzuaokoli", "value": "Uzuaokoli" },
                        { "key": "SE_Abia_Ohafia", "value": "Ohafia" },
                        { "key": "SE_Abia_Isuochi", "value": "Isuochi" },
                        { "key": "SE_Abia_Abriba", "value": "Abriba" },
                        { "key": "SE_Abia_Isikwato", "value": "Isikwato" },
                        { "key": "SE_Abia_Ubakala", "value": "Ubakala" },
                        { "key": "SE_Abia_Osisioma", "value": "Osisioma" },
                        { "key": "SE_Abia_Ariaria", "value": "Ariaria" },
                        { "key": "SE_Abia_Arochukwu", "value": "Arochukwu" },
                        { "key": "SE_Abia_Flyover", "value": "Flyover" },
                        { "key": "SE_Abia_Aba", "value": "Aba" }],

                };

                stateField.addEventListener("change", function() {
                    const selectedState = stateField.value;

                    // Clear Branch Dropdown
                    branchField.innerHTML = "";

                    if (branchOptions[selectedState]) {
                        branchOptions[selectedState].forEach(option => {
                            const opt = document.createElement("option");
                            opt.value = option.key;
                            opt.textContent = option.value;
                            branchField.appendChild(opt);
                        });
                    }
                });
            });
        </script>';
    }
}





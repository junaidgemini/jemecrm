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
                   { "key": "Orlu", "value": "Orlu" },
                        { "key": "Amakohia", "value": "Amakohia" },
                        { "key": "Wetheral", "value": "Wetheral" },
                        { "key": "Okigwe", "value": "Okigwe" },
                        { "key": "Mbaise", "value": "Mbaise" },
                        { "key": "Douglas", "value": "Douglas" },
                        { "key": "Ideato South", "value": "Ideato South" },
                        { "key": "Oreagu", "value": "Oreagu" },
                        { "key": "Obinze", "value": "Obinze" },
                        { "key": "South East Zonal Office", "value": "South East Zonal Office" },
                        { "key": "Asa", "value": "Asa" },
                        { "key": "Faulks", "value": "Faulks" },
                        { "key": "Uzuaokoli", "value": "Uzuaokoli" },
                        { "key": "Ohafia", "value": "Ohafia" },
                        { "key": "Isuochi", "value": "Isuochi" },
                        { "key": "Abriba", "value": "Abriba" },
                        { "key": "Isikwato", "value": "Isikwato" },
                        { "key": "Ubakala", "value": "Ubakala" },
                        { "key": "Osisioma", "value": "Osisioma" },
                        { "key": "Ariaria", "value": "Ariaria" },
                        { "key": "Arochukwu", "value": "Arochukwu" },
                        { "key": "Flyover", "value": "Flyover" },
                        { "key": "Aba", "value": "Aba" }],    

                     "Imo": [
                        { "key": "Orlu", "value": "Orlu" },
                        { "key": "Amakohia", "value": "Amakohia" },
                        { "key": "Wetheral", "value": "Wetheral" },
                        { "key": "Okigwe", "value": "Okigwe" },
                        { "key": "Mbaise", "value": "Mbaise" },
                        { "key": "Douglas", "value": "Douglas" },
                        { "key": "Ideato South", "value": "Ideato South" },
                        { "key": "Oreagu", "value": "Oreagu" },
                        { "key": "Obinze", "value": "Obinze" },
                        { "key": "South East Zonal Office", "value": "South East Zonal Office" }],
                    
                    "Abia": [
                        { "key": "Asa", "value": "Asa" },
                        { "key": "Faulks", "value": "Faulks" },
                        { "key": "Uzuaokoli", "value": "Uzuaokoli" },
                        { "key": "Ohafia", "value": "Ohafia" },
                        { "key": "Isuochi", "value": "Isuochi" },
                        { "key": "Abriba", "value": "Abriba" },
                        { "key": "Isikwato", "value": "Isikwato" },
                        { "key": "Ubakala", "value": "Ubakala" },
                        { "key": "Osisioma", "value": "Osisioma" },
                        { "key": "Ariaria", "value": "Ariaria" },
                        { "key": "Arochukwu", "value": "Arochukwu" },
                        { "key": "Flyover", "value": "Flyover" },
                        { "key": "Aba", "value": "Aba" }],

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





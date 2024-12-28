<?php
if (!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');

class TasksViewEdit extends ViewEdit

{
    public function display()
    {
        parent::display();

        // Fetch the saved state and branch values
        $savedState = isset($this->bean->jd_branch_state) ? $this->bean->jd_branch_state : ''; // Replace 'state_c' with your actual field name
        $savedBranch = isset($this->bean->jd_branch) ? $this->bean->jd_branch : ''; // Replace 'branch_c' with your actual field name

        // Pass these values to the frontend using Smarty
        $this->ss->assign('JD_BRANCH_STATE', $savedState);
        $this->ss->assign('JD_BRANCH', $savedBranch);

        // Add custom JS for dropdown dependency
        echo '<script type="text/javascript">
            $(document).ready(function() {
            console.log("Custom JS for Tasks is loaded.");


               // Simulate the onchange event of the state dropdown to filter branches
                // const stateDropdown = document.getElementById("jd_branch_state");
                // if (stateDropdown) {
                //     stateDropdown.dispatchEvent(new Event("change"));
                // }

                const stateField = document.getElementById("jd_branch_state");
                const branchField = document.getElementById("jd_branch");



                const savedState = "{JD_BRANCH_STATE}";
                const savedBranch = "{JD_BRANCH}";

                const stateDropdown = document.getElementById("jd_branch_state");
                const branchDropdown = document.getElementById("jd_branch");

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
                    { "key": "Ikire", "value": "Ikire" },
                        { "key": "Ogo Oluwa", "value": "Ogo Oluwa" },
                        { "key": "Ila Oragun", "value": "Ila Oragun" },
                        { "key": "Inisa", "value": "Inisa" },
                        { "key": "Ilesha 1", "value": "Ilesha 1" },
                        { "key": "Ede", "value": "Ede" },
                        { "key": "Erin Osun", "value": "Erin Osun" },
                        { "key": "Ibokun", "value": "Ibokun" },
                        { "key": "Ife 2", "value": "Ife 2" },
                        { "key": "Modakeke", "value": "Modakeke" },
                        { "key": "Gbogan", "value": "Gbogan" },
                        { "key": "Ipetumodu", "value": "Ipetumodu" },
                        { "key": "Araromi", "value": "Araromi" },
                        { "key": "Obatedo", "value": "Obatedo" },
                        { "key": "Obelawo Mega", "value": "Obelawo Mega" },
                        { "key": "Ota -Efun", "value": "Ota -Efun" },
                        { "key": "Estate", "value": "Estate" },
                        { "key": "Esa -Oke", "value": "Esa -Oke" },
                        { "key": "Ifetedo", "value": "Ifetedo" },
                        { "key": "Ifewara", "value": "Ifewara" },
                        { "key": "Igbono", "value": "Igbono" },
                        { "key": "isale-Osun", "value": "isale-Osun" },
                        { "key": "Ipe-Ijesha", "value": "Ipe-Ijesha" },
                        { "key": "Owode-Ede", "value": "Owode-Ede" },
                        { "key": "South West Zonal Office", "value": "South West Zonal Office" },
                        { "key": "Ikirun", "value": "Ikirun" },
                        { "key": "Ilesha-2", "value": "Ilesha-2" },
                        { "key": "Ife 1 Mega", "value": "Ife 1 Mega" },
                        { "key": "Oke-Ejigbo", "value": "Oke-Ejigbo" },
                        { "key": "Offa", "value": "Offa" },
                        { "key": "Illorin 1 Mega Branch", "value": "Illorin 1 Mega Branch" },
                        { "key": "Illorin 2", "value": "Illorin 2" },
                        { "key": "Illorin 3", "value": "Illorin 3" },
                        { "key": "Omuaran", "value": "Omuaran" },
                        { "key": "Oja", "value": "Oja" },
                        { "key": "Share", "value": "Share" },
                        { "key": "Lafiagi", "value": "Lafiagi" },
                        { "key": "Erin-Ile", "value": "Erin-Ile" },
                        { "key": "Kosubosu", "value": "Kosubosu" },
                        { "key": "Kayama", "value": "Kayama" },
                        { "key": "Patigi", "value": "Patigi" },
                        { "key": "Ojatutu", "value": "Ojatutu" },
                        { "key": "Jebba", "value": "Jebba" },
                        {"key": "Apomu", "value": "Apomu"}
                    ],    

                    "Osun": [
                        { "key": "Ikire", "value": "Ikire" },
                        { "key": "Ogo Oluwa", "value": "Ogo Oluwa" },
                        { "key": "Ila Oragun", "value": "Ila Oragun" },
                        { "key": "Inisa", "value": "Inisa" },
                        { "key": "Ilesha 1", "value": "Ilesha 1" },
                        { "key": "Ede", "value": "Ede" },
                        { "key": "Erin Osun", "value": "Erin Osun" },
                        { "key": "Ibokun", "value": "Ibokun" },
                        { "key": "Ife 2", "value": "Ife 2" },
                        { "key": "Modakeke", "value": "Modakeke" },
                        { "key": "Gbogan", "value": "Gbogan" },
                        { "key": "Ipetumodu", "value": "Ipetumodu" },
                        { "key": "Araromi", "value": "Araromi" },
                        { "key": "Obatedo", "value": "Obatedo" },
                        { "key": "Obelawo Mega", "value": "Obelawo Mega" },
                        { "key": "Ota -Efun", "value": "Ota -Efun" },
                        { "key": "Estate", "value": "Estate" },
                        { "key": "Esa -Oke", "value": "Esa -Oke" },
                        { "key": "Ifetedo", "value": "Ifetedo" },
                        { "key": "Ifewara", "value": "Ifewara" },
                        { "key": "Igbono", "value": "Igbono" },
                        { "key": "isale-Osun", "value": "isale-Osun" },
                        { "key": "Ipe-Ijesha", "value": "Ipe-Ijesha" },
                        { "key": "Owode-Ede", "value": "Owode-Ede" },
                        { "key": "South West Zonal Office", "value": "South West Zonal Office" },
                        { "key": "Ikirun", "value": "Ikirun" },
                        { "key": "Ilesha-2", "value": "Ilesha-2" },
                        { "key": "Ife 1 Mega", "value": "Ife 1 Mega" },
                        { "key": "Oke-Ejigbo", "value": "Oke-Ejigbo" }],

                    "Kwara": [
                        { "key": "Offa", "value": "Offa" },
                        { "key": "Illorin 1 Mega Branch", "value": "Illorin 1 Mega Branch" },
                        { "key": "Illorin 2", "value": "Illorin 2" },
                        { "key": "Illorin 3", "value": "Illorin 3" },
                        { "key": "Omuaran", "value": "Omuaran" },
                        { "key": "Oja", "value": "Oja" },
                        { "key": "Share", "value": "Share" },
                        { "key": "Lafiagi", "value": "Lafiagi" },
                        { "key": "Erin-Ile", "value": "Erin-Ile" },
                        { "key": "Kosubosu", "value": "Kosubosu" },
                        { "key": "Kayama", "value": "Kayama" },
                        { "key": "Patigi", "value": "Patigi" },
                        { "key": "Ojatutu", "value": "Ojatutu" },
                        { "key": "Jebba", "value": "Jebba" }],

                    "Oyo": [
                    {"key": "Apomu", "value": "Apomu"}],
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





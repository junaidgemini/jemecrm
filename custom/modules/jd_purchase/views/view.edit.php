<?php
if (!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');

class jd_purchaseViewEdit extends ViewEdit
{
    public function display()
    {
        parent::display();

        // Fetch the saved values
        $savedZone = isset($this->bean->jd_zone) ? $this->bean->jd_zone : '';
        $savedState = isset($this->bean->location) ? $this->bean->location : '';
        $savedBranch = isset($this->bean->jd_branch) ? $this->bean->jd_branch : '';

        // Pass these values to the frontend using Smarty
        $this->ss->assign('JD_ZONE', $savedZone);
        $this->ss->assign('JD_BRANCH_STATE', $savedState);
        // $this->ss->assign('JD_BRANCH', $savedBranch);

        // Add custom JS for dropdown dependency
        echo '<script type="text/javascript">
            $(document).ready(function() {
                console.log("Custom JS for Tasks is loaded.");

                const zoneField = document.getElementById("jd_zone");
                const stateField = document.getElementById("location");
                const branchField = document.getElementById("jd_branch");

                const savedZone = "'.$savedZone.'";
                const savedState = "'.$savedState.'";
                const savedBranch = "'.$savedBranch.'";

                const zoneOptions = {
                   "Edo": [
                        {"key": "", "value": ""},
                        {"key": "Edo", "value": "Edo"}
                    ],
                    "Delta": [
                        {"key": "", "value": ""},
                        {"key": "Delta", "value": "Delta"},
                        {"key": "Bayelsa", "value": "Bayelsa"}
                    ],
                    "Enugu": [
                        {"key": "", "value": ""},
                        {"key": "Anambra", "value": "Anambra"},
                        {"key": "Enugu", "value": "Enugu"},
                        {"key": "Ebonyi", "value": "Ebonyi"}
                    ],
                    "North East": [
                        {"key": "", "value": ""},
                        {"key": "Kano", "value": "Kano"},
                        {"key": "Jigawa", "value": "Jigawa"},
                        {"key": "Plateau", "value": "Plateau"},
                        {"key": "Bauchi", "value": "Bauchi"},
                        {"key": "Gombe", "value": "Gombe"}
                    ],
                    "FCT": [
                        {"key": "", "value": ""},
                        {"key": "Abuja", "value": "Abuja"},
                        {"key": "Kaduna", "value": "Kaduna"},
                        {"key": "Nasarawa", "value": "Nasarawa"},
                        {"key": "Niger", "value": "Niger"}
                    ],
                    "North West": [
                        {"key": "", "value": ""},
                        {"key": "Katsina", "value": "Katsina"},
                        {"key": "Kebbi", "value": "Kebbi"},
                        {"key": "Zamfara", "value": "Zamfara"},
                        {"key": "Sokoto", "value": "Sokoto"}
                    ],
                    "Middle Belt": [
                        {"key": "", "value": ""},
                        {"key": "Kogi", "value": "Kogi"},
                        {"key": "Benue", "value": "Benue"},
                        {"key": "Adamawa", "value": "Adamawa"},
                        {"key": "Taraba", "value": "Taraba"}
                    ],
                    "Ondo": [
                        {"key": "", "value": ""},
                        {"key": "Ekiti", "value": "Ekiti"},
                        {"key": "Ondo", "value": "Ondo"}
                    ],
                    "South West": [
                        {"key": "", "value": ""},
                        {"key": "Osun", "value": "Osun"},
                        {"key": "Kwara", "value": "Kwara"},
                        {"key": "Oyo", "value": "Oyo"}
                    ],
                    "Lagos Central": [
                        {"key": "", "value": ""},
                        {"key": "Lagos", "value": "Lagos"},
                        {"key": "Ogun", "value": "Ogun"}
                    ],
                    "Lagos West": [
                        {"key": "", "value": ""},
                        {"key": "Lagos", "value": "Lagos"},
                        {"key": "Ogun", "value": "Ogun"}
                    ],
                    "Lagos Mainland": [
                        {"key": "", "value": ""},
                        {"key": "Lagos", "value": "Lagos"}
                    ],
                    "Rivers": [
                        {"key": "", "value": ""},
                        {"key": "Rivers", "value": "Rivers"}
                    ],
                    "South East": [
                        {"key": "", "value": ""},
                        {"key": "Imo", "value": "Imo"},
                        {"key": "Abia", "value": "Abia"}
                    ],
                    "Calabar": [
                        {"key": "", "value": ""},
                        {"key": "Cross River", "value": "Cross River"},
                        {"key": "Calabar", "value": "Calabar"},
                        {"key": "Akwa-Ibom", "value": "Akwa-Ibom"}
                    ],
                    "Oyo": [
                        {"key": "", "value": ""},
                        {"key": "Oyo", "value": "Oyo"}
                    ],
                    "Public Sector": [
                        {"key": "", "value": ""},
                        {"key": "Lagos", "value": "Lagos"}
                    ],
                    "SME Consumer Segment": [
                        {"key": "", "value": ""},
                        {"key": "Lagos", "value": "Lagos"},
                        {"key": "Ogun", "value": "Ogun"},
                        {"key": "Oyo", "value": "Oyo"},
                        {"key": "Ondo", "value": "Ondo"},
                        {"key": "Edo", "value": "Edo"},
                        {"key": "Delta", "value": "Delta"},
                        {"key": "Rivers", "value": "Rivers"},
                        {"key": "Imo/Abia", "value": "Imo/Abia"},
                        {"key": "Akwa-Ibom/Cross River", "value": "Akwa-Ibom/Cross River"},
                        {"key": "Kwara/Osun", "value": "Kwara/Osun"},
                        {"key": "Kano", "value": "Kano"},
                        {"key": "Enugu/Anambra", "value": "Enugu/Anambra"},
                        {"key": "Abuja/Niger/Kaduna/Nassarawa", "value": "Abuja/Niger/Kaduna/Nassarawa"}
                    ],
                    "Education Finance": [
                        {"key": "", "value": ""},
                        {"key": "Lagos", "value": "Lagos"}
                    ],
                    "Head Office": [
                        {"key": "", "value": ""},
                        {"key": "Edo", "value": "Edo"}
                    ],
                };

                const branchOptions = {
                    "Edo": [
                        {"key": "", "value": ""},
                        {"key": "Benin 1", "value": "Benin 1"},
                        {"key": "Benin 2", "value": "Benin 2"},
                        {"key": "Ikpoba-Hill", "value": "Ikpoba-Hill"},
                        {"key": "Dawson", "value": "Dawson"},
                        {"key": "Aduwawa", "value": "Aduwawa"},
                        {"key": "Auchi", "value": "Auchi"},
                        {"key": "Uromi", "value": "Uromi"},
                        {"key": "Ekpoma", "value": "Ekpoma"},
                        {"key": "Ubiaja", "value": "Ubiaja"},
                        {"key": "Upper Sokponba", "value": "Upper Sokponba"},
                        {"key": "Sapele Road", "value": "Sapele Road"},
                        {"key": "Oka", "value": "Oka"},
                        {"key": "Oko", "value": "Oko"},
                        {"key": "First East Circular", "value": "First East Circular"},
                        {"key": "Uselu", "value": "Uselu"},
                        {"key": "Evbuotubu", "value": "Evbuotubu"},
                        {"key": "Uwelu", "value": "Uwelu"},
                        {"key": "Adesogbe", "value": "Adesogbe"},
                        {"key": "Ugbowo 1", "value": "Ugbowo 1"},
                        {"key": "Ugbowo 2", "value": "Ugbowo 2"},
                        {"key": "Ekenwan Road", "value": "Ekenwan Road"},
                        {"key": "Okada", "value": "Okada"}
                    ],
                    "Delta": [
                        {"key": "", "value": ""},
                        {"key": "Ogwashi-Uku", "value": "Ogwashi-Uku"},
                        {"key": "Asaba 1", "value": "Asaba 1"},
                        {"key": "Asaba 2", "value": "Asaba 2"},
                        {"key": "Asaba 3", "value": "Asaba 3"},
                        {"key": "Agbor 1", "value": "Agbor 1"},
                        {"key": "Agbor 2", "value": "Agbor 2"},
                        {"key": "Warri 1", "value": "Warri 1"},
                        {"key": "Warri 2", "value": "Warri 2"},
                        {"key": "Warri 3", "value": "Warri 3"},
                        {"key": "Warri 4", "value": "Warri 4"},
                        {"key": "Ughelli", "value": "Ughelli"},
                        {"key": "Oleh", "value": "Oleh"},
                        {"key": "Sapele", "value": "Sapele"},
                        {"key": "Abraka", "value": "Abraka"}
                    ],
                    "Anambra": [
                        {"key": "", "value": ""},
                        {"key": "Iweka", "value": "Iweka"},
                        {"key": "Awka", "value": "Awka"},
                        {"key": "Obosi", "value": "Obosi"},
                        {"key": "Nnewi", "value": "Nnewi"},
                        {"key": "Okpoko", "value": "Okpoko"},
                        {"key": "Ekwulobia", "value": "Ekwulobia"},
                        {"key": "Ihiala", "value": "Ihiala"}
                    ],
                    "Bayelsa": [
                        {"key": "", "value": ""},
                        {"key": "Akenfa", "value": "Akenfa"},
                        {"key": "Opolo", "value": "Opolo"},
                        {"key": "Swali", "value": "Swali"}
                    ],
                    "Kano": [
                        {"key": "", "value": ""},
                        {"key": "Naibawa", "value": "Naibawa"},
                        {"key": "Hotoro", "value": "Hotoro"},
                        {"key": "Dala", "value": "Dala"},
                        {"key": "Bompai", "value": "Bompai"},
                        {"key": "Sabo Gari", "value": "Sabo Gari"}
                    ],
                    "Kaduna": [
                        {"key": "", "value": ""},
                        {"key": "Zaria 1", "value": "Zaria 1"},
                        {"key": "Zaria 2", "value": "Zaria 2"},
                        {"key": "Kawo", "value": "Kawo"},
                        {"key": "Sabo Tasha", "value": "Sabo Tasha"},
                        {"key": "Nnamdi Azikiwe", "value": "Nnamdi Azikiwe"},
                        {"key": "Barnawa", "value": "Barnawa"},
                        {"key": "Kafanchan", "value": "Kafanchan"},
                        {"key": "Ahmadu Bello", "value": "Ahmadu Bello"}
                    ],
                    "Katsina": [
                        {"key": "", "value": ""},
                        {"key": "Funtua", "value": "Funtua"}
                    ],
                    "Niger": [
                        {"key": "", "value": ""},
                        {"key": "Minna 1", "value": "Minna 1"},
                        {"key": "Bida", "value": "Bida"},
                        {"key": "Suleja", "value": "Suleja"}
                    ],
                    "Nasarawa": [
                        {"key": "", "value": ""},
                        {"key": "New Karu", "value": "New Karu"},
                        {"key": "Nyanyan", "value": "Nyanyan"},
                        {"key": "Keffi", "value": "Keffi"},
                        {"key": "Nasarawa", "value": "Nasarawa"},
                        {"key": "Akwanga", "value": "Akwanga"},
                        {"key": "Lafia", "value": "Lafia"}
                    ],
                    "Abuja": [
                        {"key": "", "value": ""},
                        {"key": "Kubwa", "value": "Kubwa"},
                        {"key": "Abaji", "value": "Abaji"},
                        {"key": "Kuje", "value": "Kuje"}
                    ],
                    "Kogi": [
                        {"key": "", "value": ""},
                        {"key": "Lokoja 1", "value": "Lokoja 1"},
                        {"key": "Lokoja 2", "value": "Lokoja 2"},
                        {"key": "Okene", "value": "Okene"},
                        {"key": "Okene 2", "value": "Okene 2"},
                        {"key": "Obajana", "value": "Obajana"},
                        {"key": "Kabba", "value": "Kabba"},
                        {"key": "Isanlu", "value": "Isanlu"},
                        {"key": "Egbe", "value": "Egbe"},
                        {"key": "Anyigba", "value": "Anyigba"},
                        {"key": "Ankpa", "value": "Ankpa"},
                        {"key": "Idah", "value": "Idah"}
                    ],
                    "Benue": [
                        {"key": "", "value": ""},
                        {"key": "Makurdi 1", "value": "Makurdi 1"},
                        {"key": "Makurdi 3", "value": "Makurdi 3"},
                        {"key": "Gboko 1", "value": "Gboko 1"},
                        {"key": "Gboko 2", "value": "Gboko 2"},
                        {"key": "Kastina Ala", "value": "Kastina Ala"},
                        {"key": "Otupka", "value": "Otupka"}
                    ],
                    "Adamawa": [ 
                        {"key": "", "value": ""}, 
                        {"key": "Zakibiam", "value": "Zakibiam"},
                        {"key": "Yola 1", "value": "Yola 1"},
                        {"key": "Yola 2", "value": "Yola 2"},
                        {"key": "Yola 3", "value": "Yola 3"},
                        {"key": "Numan", "value": "Numan"},
                        {"key": "Mubi 1", "value": "Mubi 1"},
                        {"key": "Mubi 2", "value": "Mubi 2"},
                        {"key": "Ganye", "value": "Ganye"}
                    ],
                    "Ekiti": [ 
                        {"key": "", "value": ""},
                        {"key": "Ikole Ekiti", "value": "Ikole Ekiti"},
                        {"key": "Omuo Ekiti", "value": "Omuo Ekiti"},
                        {"key": "Ado Ekiti Mega", "value": "Ado Ekiti Mega"},
                        {"key": "Ado Ekiti 2", "value": "Ado Ekiti 2"},
                        {"key": "Oke-Ila", "value": "Oke-Ila"},
                        {"key": "Ifaki", "value": "Ifaki"},
                        {"key": "Igbaro-Odo", "value": "Igbaro-Odo"},
                        {"key": "Aramoko", "value": "Aramoko"},
                        {"key": "Ido-Ekiti", "value": "Ido-Ekiti"},
                        {"key": "Ikere-Ekiti", "value": "Ikere-Ekiti"},
                        {"key": "Iye-Ekiti", "value": "Iye-Ekiti"},
                        {"key": "Efeson Alaye", "value": "Efeson Alaye"},
                        {"key": "Efon-Alaye", "value": "Efon-Alaye"}
                    ],
                    "Oyo": [
                        {"key": "", "value": ""},
                        {"key": "Oyo 1", "value": "Oyo 1"},
                        {"key": "Oyo 2", "value": "Oyo 2"},
                        {"key": "Moniya", "value": "Moniya"},
                        {"key": "Ilora", "value": "Ilora"},
                        {"key": "Bodija 2", "value": "Bodija 2"},
                        {"key": "Dugbe", "value": "Dugbe"},
                        {"key": "Eleyele", "value": "Eleyele"},
                        {"key": "Ojo", "value": "Ojo"},
                        {"key": "Eruwa", "value": "Eruwa"},
                        {"key": "Bodija 1", "value": "Bodija 1"},
                        {"key": "Apata", "value": "Apata"},
                        {"key": "Challenge", "value": "Challenge"},
                        {"key": "Mokola", "value": "Mokola"},
                        {"key": "Beere", "value": "Beere"},
                        {"key": "Oke-Ado 2", "value": "Oke-Ado 2"},
                        {"key": "Oke-Ado 1", "value": "Oke-Ado 1"},
                        {"key": "Oja Oba", "value": "Oja Oba"},
                        {"key": "Old Ife", "value": "Old Ife"},
                        {"key": "Odinjo", "value": "Odinjo"},
                        {"key": "Olorunshogo", "value": "Olorunshogo"},
                        {"key": "Iseyin", "value": "Iseyin"},
                        {"key": "Isale-Ola", "value": "Isale-Ola"},
                        {"key": "Saki", "value": "Saki"},
                        {"key": "Iwo Road 2", "value": "Iwo Road 2"},
                        {"key": "Iyana Church", "value": "Iyana Church"},
                        {"key": "Okeho", "value": "Okeho"},
                        {"key": "Igboho", "value": "Igboho"},
                        {"key": "Igboora", "value": "Igboora"},
                        {"key": "Ladoke", "value": "Ladoke"},
                        {"key": "Oloope", "value": "Oloope"},
                        {"key": "Abapanu", "value": "Abapanu"}
                    ],
                    "Osun": [
                        {"key": "", "value": ""},
                        {"key": "Ikire", "value": "Ikire"},
                        {"key": "Ogo Oluwa", "value": "Ogo Oluwa"},
                        {"key": "Ila Orangun", "value": "Ila Orangun"},
                        {"key": "Inisa", "value": "Inisa"},
                        {"key": "Ilesa 1", "value": "Ilesa 1"},
                        {"key": "Ede", "value": "Ede"},
                        {"key": "Erin Osun", "value": "Erin Osun"},
                        {"key": "Ibokun", "value": "Ibokun"},
                        {"key": "Estate", "value": "Estate"},
                        {"key": "Ifetedo", "value": "Ifetedo"},
                        {"key": "Modakeke", "value": "Modakeke"},
                        {"key": "Gbongan", "value": "Gbongan"},
                        {"key": "Ipetumodu", "value": "Ipetumodu"},
                        {"key": "Araromi", "value": "Araromi"},
                        {"key": "Obatedo", "value": "Obatedo"},
                        {"key": "Obelawo Mega", "value": "Obelawo Mega"},
                        {"key": "Okeho", "value": "Okeho"},
                        {"key": "Efon-Alaye", "value": "Efon-Alaye"},
                        {"key": "Ikirun", "value": "Ikirun"},
                        {"key": "Ilesa 2", "value": "Ilesa 2"},
                        {"key": "IFE1 Mega", "value": "IFE1 Mega"},
                        {"key": "Ola", "value": "Ola"},
                        {"key": "Oke-Ejigbo", "value": "Oke-Ejigbo"},
                        {"key": "Ayetan", "value": "Ayetan"}
                    ],
                    "Enugu": [
                        {"key": "", "value": ""},
                        {"key": "Agbani", "value": "Agbani"},
                        {"key": "Zik Road", "value": "Zik Road"},
                        {"key": "Nkanu", "value": "Nkanu"},
                        {"key": "Orji", "value": "Orji"},
                        {"key": "9th Mile", "value": "9th Mile"},
                        {"key": "Obollo", "value": "Obollo"},
                        {"key": "Orba", "value": "Orba"},
                        {"key": "Nsukka", "value": "Nsukka"},
                        {"key": "Ogbete", "value": "Ogbete"},
                        {"key": "Abakpa", "value": "Abakpa"},
                        {"key": "Emene", "value": "Emene"},
                        {"key": "Nsukka 2", "value": "Nsukka 2"},
                        {"key": "Ishiagu", "value": "Ishiagu"},
                        {"key": "Orifite", "value": "Orifite"},
                        {"key": "Enugu Zone Zonal Office", "value": "Enugu Zone Zonal Office"}
                    ],
                    "Ebonyi": [
                        {"key": "", "value": ""},
                        {"key": "Ebonyi Mega", "value": "Ebonyi Mega"},
                        {"key": "Ogoja", "value": "Ogoja"},
                        {"key": "Afikpo", "value": "Afikpo"},
                        {"key": "Abakaliki", "value": "Abakaliki"},
                        {"key": "Ezzamgbo", "value": "Ezzamgbo"},
                        {"key": "Onueka", "value": "Onueka"},
                    ],
                    "Taraba": [
                        {"key": "", "value": ""},
                        {"key": "Wukari", "value": "Wukari"},
                        {"key": "Hammaruwa", "value": "Hammaruwa"},
                        {"key": "Sabo Jalingo", "value": "Sabo Jalingo"},
                        {"key": "Barde", "value": "Barde"},
                        {"key": "Gembu", "value": "Gembu"}
                    ],
                    "Kebbi": [
                        {"key": "", "value": ""},
                        {"key": "Zuru", "value": "Zuru"},
                        {"key": "Yauri", "value": "Yauri"},
                        {"key": "Kebbi 1", "value": "Kebbi 1"},
                        {"key": "Kebbi 2", "value": "Kebbi 2"},
                        {"key": "Jega", "value": "Jega"},
                        {"key": "Argungu", "value": "Argungu"},
                        {"key": "Maiyama", "value": "Maiyama"},
                        {"key": "Bagudo", "value": "Bagudo"}
                    ],
                    "Zamfara": [
                        {"key": "", "value": ""},
                        {"key": "Gusau 1", "value": "Gusau 1"},
                        {"key": "Gusau 2", "value": "Gusau 2"},
                        {"key": "Kaura Namoda", "value": "Kaura Namoda"},
                        {"key": "North West Zone Zonal Office", "value": "North West Zone Zonal Office"}
                ],
                "Jigawa": [
                        {"key": "", "value": ""},
                        {"key": "Hadeja", "value": "Hadeja"},
                        {"key": "Dutse", "value": "Dutse"},
                        {"key": "Gumel", "value": "Gumel"}
                    ],
                    "Sokoto": [
                        {"key": "", "value": ""},
                        {"key": "Sokoto", "value": "Sokoto"},
                        {"key": "Angwan Rogo", "value": "Angwan Rogo"},
                        {"key": "Ilella", "value": "Ilella"},
                        {"key": "Dandima", "value": "Dandima"},
                        {"key": "Isa", "value": "Isa"},
                        {"key": "Tambuwai", "value": "Tambuwai"},
                        {"key": "Sabon Birni", "value": "Sabon Birni"},
                        {"key": "Bodinga", "value": "Bodinga"}
                    ],
                    "Plateau": [
                        {"key": "", "value": ""},
                        {"key": "Bukuru", "value": "Bukuru"},
                        {"key": "Faringada", "value": "Faringada"},
                        {"key": "Shendam", "value": "Shendam"},
                        {"key": "Taraminus", "value": "Taraminus"},
                        {"key": "Mangu", "value": "Mangu"}
                    ],
                    "Bauchi": [
                        {"key": "", "value": ""},
                        {"key": "Wunti", "value": "Wunti"},
                        {"key": "Yelwa", "value": "Yelwa"},
                        {"key": "Murtala Muhammed", "value": "Murtala Muhammed"},
                        {"key": "Azare", "value": "Azare"},
                        {"key": "North East Zone Zonal Office", "value": "North East Zone Zonal Office"}
                    ],
                    "Gombe": [
                        {"key": "", "value": ""},
                        {"key": "Buba Yaro", "value": "Buba Yaro"},
                        {"key": "Bank Road", "value": "Bank Road"},
                        {"key": "Dukku", "value": "Dukku"}
                    ],
                    "Imo/Abia": [
                        {"key": "", "value": ""},
                        {"key": "SME South East", "value": "SME South East"}
                    ],
                    "Akwa-Ibom/Cross River":[
                        {"key": "", "value": ""},
                        {"key": "SME Calabar", "value": "SME Calabar"}
                    ],
                    "Kwara/Osun":[
                        {"key": "", "value": ""},
                        {"key": "SME South west", "value": "SME South West"}
                    ],
                    "Enugu/Anambra": [
                        {"key": "", "value": ""},
                        {"key": "Naibawa", "value": "Naibawa"},
                        {"key": "Hotoro", "value": "Hotoro"},
                        {"key": "Dala", "value": "Dala"},
                        {"key": "Bompai", "value": "Bompai"},
                        {"key": "Sabo Gari", "value": "Sabo Gari"},
                        {"key": "Dawanu", "value": "Dawanu"},
                        {"key": "Dambatta", "value": "Dambatta"},
                        {"key": "Wudil", "value": "Wudil"},
                        {"key": "Rano", "value": "Rano"},
                        {"key": "Lamingo", "value": "Lamingo"},
                        {"key": "SME Kano", "value": "SME Kano"},
                        {"key": "Panshekara", "value": "Panshekara"}
                    ],
                    "Abuja/Niger/Kaduna/Nassarawa": [
                        {"key": "", "value": ""},
                        {"key": "SME FCT", "value": "SME FCT"},
                        {"key": "SME FCT 2", "value": "SME FCT 2"}
                    ],
                    "Lagos": [
                        {"key": "Apomu", "value": "Apomu"}
                    ]
                };

                zoneField.addEventListener("change", function() {
                    const selectedZone = zoneField.value;
                    debugger;
                    if (selectedZone) {
                        stateField.innerHTML = "";
                        // branchField.innerHTML = "";
                        zoneOptions[selectedZone].forEach(state => {
                        debugger;
                            const opt = document.createElement("option");
                            opt.value = state.value;
                            opt.textContent = state.value;
                            stateField.appendChild(opt);
                        });
                    }
                });

                // stateField.addEventListener("change", function() {
                //     const selectedState = stateField.value;

                //     if (selectedState) {
                //         branchField.innerHTML = "";
                //         branchOptions[selectedState].forEach(option => {
                //             const opt = document.createElement("option");
                //             opt.value = option.key;
                //             opt.textContent = option.value;
                //             branchField.appendChild(opt);
                //         });
                //     }
                // });

                if (savedZone) {
                    zoneField.value = savedZone;
                    zoneField.dispatchEvent(new Event("change"));
                }

                if (savedState) {
                    setTimeout(() => {
                        stateField.value = savedState;
                        stateField.dispatchEvent(new Event("change"));
                    }, 100);
                }

                if (savedBranch) {
                    setTimeout(() => {
                        branchField.value = savedBranch;
                    }, 200);
                }
            });
        </script>';
    }
}

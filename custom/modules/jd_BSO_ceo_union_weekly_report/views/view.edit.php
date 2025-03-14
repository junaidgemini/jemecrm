<?php
if (!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');

class jd_BSO_ceo_union_weekly_reportViewEdit extends ViewEdit
{
    public function display()
    {
        parent::display();

        // Fetch the saved values
        $savedZone = isset($this->bean->jd_zone) ? $this->bean->jd_zone : '';
        $savedState = isset($this->bean->jd_branch_state) ? $this->bean->jd_branch_state : '';
        $savedBranch = isset($this->bean->jd_branch) ? $this->bean->jd_branch : '';
        $savedBranchEmails = isset($this->bean->branch_email) ? $this->bean->branch_email : '';

        // Pass these values to the frontend using Smarty
        $this->ss->assign('JD_ZONE', $savedZone);
        $this->ss->assign('JD_BRANCH_STATE', $savedState);
        $this->ss->assign('JD_BRANCH', $savedBranch);
        $this->ss->assign('JD_SAVEDBRANCHEMAILS', $savedBranchEmails);


        // Add custom JS for dropdown dependency
        echo '<script type="text/javascript">
            $(document).ready(function() {
                // hide assignedto field
                $(`div[data-field="assigned_user_name"]`).hide();
                
                console.log("Custom JS for Tasks is loaded.");

                const zoneField = document.getElementById("jd_zone");
                const stateField = document.getElementById("jd_branch_state");
                const branchField = document.getElementById("jd_branch");
                const branchEmails = document.getElementById("branch_email");


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
                        {"key": "Lagos 1", "value": "Lagos 1"},
                        {"key": "Lagos 2", "value": "Lagos 2"},
                        {"key": "Lagos 5", "value": "Lagos 5"},
                        {"key": "Ogun", "value": "Ogun"}
                    ],
                    "Lagos West": [
                        {"key": "", "value": ""},
                        {"key": "Lagos 4", "value": "Lagos 4"},
                        {"key": "Lagos 5", "value": "Lagos 5"},
                        {"key": "Ogun", "value": "Ogun"}
                    ],
                    "Lagos Mainland": [
                        {"key": "", "value": ""},
                        {"key": "Lagos 1", "value": "Lagos 1"},
                        {"key": "Lagos 3", "value": "Lagos 3"},
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
                        {"key": "BENIN 1", "value": "BENIN 1"},
                        {"key": "BENIN 2", "value": "BENIN 2"},
                        {"key": "IKPOBA-HILL", "value": "IKPOBA-HILL"},
                        {"key": "DAWSON", "value": "DAWSON"},
                        {"key": "ADUWAWA", "value": "ADUWAWA"},
                        {"key": "AUCHI", "value": "AUCHI"},
                        {"key": "UROMI", "value": "UROMI"},
                        {"key": "EKPOMA", "value": "EKPOMA"},
                        {"key": "UBIAJA", "value": "UBIAJA"},
                        {"key": "UPPER SOKPONBA", "value": "UPPER SOKPONBA"},
                        {"key": "SAPELE ROAD", "value": "SAPELE ROAD"},
                        {"key": "OKA", "value": "OKA"},
                        {"key": "OKO", "value": "OKO"},
                        {"key": "FIRST EAST CIRCULAR", "value": "FIRST EAST CIRCULAR"},
                        {"key": "USELU", "value": "USELU"},
                        {"key": "EVBUOTUBU", "value": "EVBUOTUBU"},
                        {"key": "UWELU", "value": "UWELU"},
                        {"key": "ADESOGBE", "value": "ADESOGBE"},
                        {"key": "UGBOWO 1", "value": "UGBOWO 1"},
                        {"key": "UGBOWO 2", "value": "UGBOWO 2"},
                        {"key": "EKENWAN ROAD", "value": "EKENWAN ROAD"},
                        {"key": "OKADA", "value": "OKADA"}
                    ],
                    "Delta": [
                        {"key": "", "value": ""},
                        {"key": "OGWASHI-UKU", "value": "OGWASHI-UKU"},
                        {"key": "ASABA 1", "value": "ASABA 1"},
                        {"key": "ASABA 2", "value": "ASABA 2"},
                        {"key": "ASABA 3", "value": "ASABA 3"},
                        {"key": "AGBOR 1", "value": "AGBOR 1"},
                        {"key": "AGBOR 2", "value": "AGBOR 2"},
                        {"key": "WARRI 1", "value": "WARRI 1"},
                        {"key": "WARRI 2", "value": "WARRI 2"},
                        {"key": "WARRI 3", "value": "WARRI 3"},
                        {"key": "WARRI 4", "value": "WARRI 4"},
                        {"key": "UGHELLI", "value": "UGHELLI"},
                        {"key": "OLEH", "value": "OLEH"},
                        {"key": "SAPELE", "value": "SAPELE"},
                        {"key": "ABRAKA", "value": "ABRAKA"}
                    ],
                    "Anambra": [
                        {"key": "", "value": ""},
                        {"key": "IWEKA", "value": "IWEKA"},
                        {"key": "AWKA", "value": "AWKA"},
                        {"key": "OBOSI", "value": "OBOSI"},
                        {"key": "NNEWI", "value": "NNEWI"},
                        {"key": "OKPOKO", "value": "OKPOKO"},
                        {"key": "EKWULOBIA", "value": "EKWULOBIA"},
                        {"key": "IHIALA", "value": "IHIALA"}
                    ],
                    "Bayelsa": [
                        {"key": "", "value": ""},
                        {"key": "AKENFA", "value": "AKENFA"},
                        {"key": "OPOLO", "value": "OPOLO"},
                        {"key": "SWALI", "value": "SWALI"}
                    ],
                    "Kano": [
                        {"key": "", "value": ""},
                        {"key": "NAIBAWA", "value": "NAIBAWA"},
                        {"key": "HOTORO", "value": "HOTORO"},
                        {"key": "DALA", "value": "DALA"},
                        {"key": "BOMPAI", "value": "BOMPAI"},
                        {"key": "SABO GARI", "value": "SABO GARI"}
                    ],
                    "Kaduna": [
                        {"key": "", "value": ""},
                        {"key": "ZARIA 1", "value": "ZARIA 1"},
                        {"key": "ZARIA 2", "value": "ZARIA 2"},
                        {"key": "KAWO", "value": "KAWO"},
                        {"key": "SABO TASHA", "value": "SABO TASHA"},
                        {"key": "NNAMDI AZIKIWE", "value": "NNAMDI AZIKIWE"},
                        {"key": "BARNAWA", "value": "BARNAWA"},
                        {"key": "KAFANCHAN", "value": "KAFANCHAN"},
                        {"key": "AHMADU BELLO", "value": "AHMADU BELLO"}
                    ],
                    "Katsina": [
                        {"key": "", "value": ""},
                        {"key": "FUNTUA", "value": "FUNTUA"}
                    ],
                    "Niger": [
                        {"key": "", "value": ""},
                        {"key": "MINNA 1", "value": "MINNA 1"},
                        {"key": "BIDA", "value": "BIDA"},
                        {"key": "SULEJA", "value": "SULEJA"}
                    ],
                    "Nasarawa": [
                        {"key": "", "value": ""},
                        {"key": "NEW KARU", "value": "NEW KARU"},
                        {"key": "NYANYAN", "value": "NYANYAN"},
                        {"key": "KEFFI", "value": "KEFFI"},
                        {"key": "NASARAWA", "value": "NASARAWA"},
                        {"key": "AKWANGA", "value": "AKWANGA"},
                        {"key": "LAFIA", "value": "LAFIA"}
                    ],
                    "Abuja": [
                        {"key": "", "value": ""},
                        {"key": "KUBWA", "value": "KUBWA"},
                        {"key": "ABAJI", "value": "ABAJI"},
                        {"key": "KUJE", "value": "KUJE"}
                    ],
                    "Kogi": [
                        {"key": "", "value": ""},
                        {"key": "LOKOJA 1", "value": "LOKOJA 1"},
                        {"key": "LOKOJA 2", "value": "LOKOJA 2"},
                        {"key": "OKENE", "value": "OKENE"},
                        {"key": "OKENE 2", "value": "OKENE 2"},
                        {"key": "OBAJANA", "value": "OBAJANA"},
                        {"key": "KABBA", "value": "KABBA"},
                        {"key": "ISANLU", "value": "ISANLU"},
                        {"key": "EGBE", "value": "EGBE"},
                        {"key": "ANYIGBA", "value": "ANYIGBA"},
                        {"key": "ANKPA", "value": "ANKPA"},
                        {"key": "IDAH", "value": "IDAH"}
                    ],
                    "Benue": [
                        {"key": "", "value": ""},
                        {"key": "MAKURDI 1", "value": "MAKURDI 1"},
                        {"key": "MAKURDI 3", "value": "MAKURDI 3"},
                        {"key": "GBOKO 1", "value": "GBOKO 1"},
                        {"key": "GBOKO 2", "value": "GBOKO 2"},
                        {"key": "KASTINA ALA", "value": "KASTINA ALA"},
                        {"key": "OTUPKA", "value": "OTUPKA"}
                    ],
                    "Adamawa": [ 
                        {"key": "", "value": ""}, 
                        {"key": "ZAKIBIAM", "value": "ZAKIBIAM"},
                        {"key": "YOLA 1", "value": "YOLA 1"},
                        {"key": "YOLA 2", "value": "YOLA 2"},
                        {"key": "YOLA 3", "value": "YOLA 3"},
                        {"key": "NUMAN", "value": "NUMAN"},
                        {"key": "MUBI 1", "value": "MUBI 1"},
                        {"key": "MUBI 2", "value": "MUBI 2"},
                        {"key": "GANYE", "value": "GANYE"}
                    ],
                    "Ekiti": [ 
                        {"key": "", "value": ""},
                        {"key": "IKOLE EKITI", "value": "IKOLE EKITI"},
                        {"key": "OMUO EKITI", "value": "OMUO EKITI"},
                        {"key": "ADO EKITI MEGA", "value": "ADO EKITI MEGA"},
                        {"key": "ADO EKITI 2", "value": "ADO EKITI 2"},
                        {"key": "OKE-ILA", "value": "OKE-ILA"},
                        {"key": "IFAKI", "value": "IFAKI"},
                        {"key": "IGBARO-ODO", "value": "IGBARO-ODO"},
                        {"key": "ARAMOKO", "value": "ARAMOKO"},
                        {"key": "IDO-EKITI", "value": "IDO-EKITI"},
                        {"key": "IKERE-EKITI", "value": "IKERE-EKITI"},
                        {"key": "IYE-EKITI", "value": "IYE-EKITI"},
                        {"key": "EFESON ALAYE", "value": "EFESON ALAYE"},
                        {"key": "EFON-ALAYE", "value": "EFON-ALAYE"}
                    ],
                    "Ondo": [
                        {"key": "", "value": ""},
                        {"key": "OWO 1", "value": "OWO 1"},
                        {"key": "OWO 2", "value": "OWO 2"},
                        {"key": "ONDO 1", "value": "ONDO 1"},
                        {"key": "ONDO 2", "value": "ONDO 2"},
                        {"key": "IGELE MAROKO", "value": "IGELE MAROKO"},
                        {"key": "ORE", "value": "ORE"},
                        {"key": "OKITIPUPA", "value": "OKITIPUPA"},
                        {"key": "IKARE", "value": "IKARE"},
                        {"key": "AKURE 1", "value": "AKURE 1"},
                        {"key": "AKURE 2", "value": "AKURE 2"},
                        {"key": "IDANRE", "value": "IDANRE"},
                        {"key": "OKE IJEBU", "value": "OKE IJEBU"},
                        {"key": "OSHINLE", "value": "OSHINLE"},
                        {"key": "ISINKAN", "value": "ISINKAN"},
                        {"key": "OYEMEKUN", "value": "OYEMEKUN"},
                        {"key": "ORE 2", "value": "ORE 2"},
                        {"key": "IKARE 2", "value": "IKARE 2"},
                        {"key": "ITA-OGBOLU", "value": "ITA-OGBOLU"},
                        {"key": "ILE-OLUJI", "value": "ILE-OLUJI"},
                        {"key": "AKURE MEGA", "value": "AKURE MEGA"},
                        {"key": "LEO", "value": "LEO"},
                        {"key": "IRELE", "value": "IRELE"},
                        {"key": "OKA-AKOKO", "value": "OKA-AKOKO"},
                        {"key": "IDOANI", "value": "IDOANI"},
                        {"key": "ILARA-MOKIN", "value": "ILARA-MOKIN"},
                        {"key": "IFON", "value": "IFON"},
                        {"key": "SME ONDO", "value": "SME ONDO"},
                        {"key": "ONDO ZONE ZONAL OFFICE", "value": "ONDO ZONE ZONAL OFFICE"}
                    ],
                    "Kwara": [
                        {"key": "", "value": ""},
                        {"key": "OFFA", "value": "OFFA"},
                        {"key": "ILLORIN 1 MEGA", "value": "ILLORIN 1 MEGA"},
                        {"key": "ILLORIN 2", "value": "ILLORIN 2"},
                        {"key": "ILLORIN 3", "value": "ILLORIN 3"},
                        {"key": "ILORIN 4", "value": "ILORIN 4"},
                        {"key": "ORO", "value": "ORO"},
                        {"key": "OMUARAN", "value": "OMUARAN"},
                        {"key": "OJA", "value": "OJA"},
                        {"key": "SHARE", "value": "SHARE"},
                        {"key": "LAFIAGI", "value": "LAFIAGI"},
                        {"key": "ERIN-ILE", "value": "ERIN-ILE"},
                        {"key": "KOSUBOSU", "value": "KOSUBOSU"},
                        {"key": "KAYAMA", "value": "KAYAMA"},
                        {"key": "PATIGI", "value": "PATIGI"},
                        {"key": "SME SOUTH WEST", "value": "SME SOUTH WEST"},
                        {"key": "OJATUTU", "value": "OJATUTU"},
                        {"key": "JEBBA", "value": "JEBBA"}
                    ],
                    "Ogun": [
                        {"key": "", "value": ""},
                        {"key": "IFO", "value": "IFO"},
                        {"key": "OPE ILU", "value": "OPE ILU"},
                        {"key": "OWODE", "value": "OWODE"},
                        {"key": "ELEGA", "value": "ELEGA"},
                        {"key": "DALEMO", "value": "DALEMO"},
                        {"key": "AKUTE", "value": "AKUTE"},
                        {"key": "OKE-ARO", "value": "OKE-ARO"},
                        {"key": "IJAYE", "value": "IJAYE"},
                        {"key": "ITOKUN MEGA", "value": "ITOKUN MEGA"},
                        {"key": "ASERO", "value": "ASERO"},
                        {"key": "LAFEWA", "value": "LAFEWA"},
                        {"key": "AGBARA", "value": "AGBARA"},
                        {"key": "TALA", "value": "TALA"},
                        {"key": "TUGA", "value": "TUGA"},
                        {"key": "ABEOKUTA", "value": "ABEOKUTA"},
                        {"key": "MAKUN", "value": "MAKUN"},
                        {"key": "SABO", "value": "SABO"},
                        {"key": "IBAFO", "value": "IBAFO"},
                        {"key": "IJEBU-IGBO", "value": "IJEBU-IGBO"},
                        {"key": "ILARO", "value": "ILARO"},
                        {"key": "IDI-IROKO", "value": "IDI-IROKO"},
                        {"key": "AGO-IWOYE", "value": "AGO-IWOYE"},
                        {"key": "IPERU", "value": "IPERU"},
                        {"key": "AYETORO", "value": "AYETORO"},
                        {"key": "MATOGUN", "value": "MATOGUN"},
                        {"key": "ATAN", "value": "ATAN"},
                        {"key": "IGBOGILA", "value": "IGBOGILA"},
                        {"key": "ITORI", "value": "ITORI"},
                        {"key": "OSIELE", "value": "OSIELE"},
                        {"key": "IYANA-ILOGBO", "value": "IYANA-ILOGBO"},
                        {"key": "MOWE", "value": "MOWE"},
                        {"key": "ISHARA", "value": "ISHARA"},
                        {"key": "KARA", "value": "KARA"},
                        {"key": "IJOKO", "value": "IJOKO"},
                        {"key": "OGIJO", "value": "OGIJO"},
                        {"key": "ITA OSHIN", "value": "ITA OSHIN"},
                        {"key": "IJEBU MUSHIN", "value": "IJEBU MUSHIN"},
                        {"key": "OJUORE", "value": "OJUORE"},
                        {"key": "IMOWO", "value": "IMOWO"},
                        {"key": "SAPON", "value": "SAPON"},
                        {"key": "SME OGUN", "value": "SME OGUN"},
                        {"key": "AKARIGBO", "value": "AKARIGBO"},
                        {"key": "KUTO", "value": "KUTO"},
                        {"key": "LUSADA", "value": "LUSADA"}
                    ],
                    "Rivers": [
                        {"key": "", "value": ""},
                        {"key": "OBIGBO", "value": "OBIGBO"},
                        {"key": "ELELENWO", "value": "ELELENWO"},
                        {"key": "OKPORO", "value": "OKPORO"},
                        {"key": "WOJI", "value": "WOJI"},
                        {"key": "RUMUOKORO", "value": "RUMUOKORO"},
                        {"key": "RUMUOKWUTA", "value": "RUMUOKWUTA"},
                        {"key": "MILE 3", "value": "MILE 3"},
                        {"key": "BOROKIRI", "value": "BOROKIRI"},
                        {"key": "MILE 1", "value": "MILE 1"},
                        {"key": "AGGREY", "value": "AGGREY"},
                        {"key": "CHOBA", "value": "CHOBA"},
                        {"key": "AHODA", "value": "AHODA"},
                        {"key": "ELELE", "value": "ELELE"},
                        {"key": "NORWAN", "value": "NORWAN"},
                        {"key": "UMUEBELE", "value": "UMUEBELE"},
                        {"key": "STADIUM ROAD", "value": "STADIUM ROAD"},
                        {"key": "STADIUM ROAD-SME", "value": "STADIUM ROAD-SME"},
                        {"key": "SOUTH-SOUTH ZONE ZONAL OFFICE", "value": "SOUTH-SOUTH ZONE ZONAL OFFICE"}
                    ],
                    "Imo": [
                        {"key": "", "value": ""},
                        {"key": "OBIGBO", "value": "OBIGBO"},
                        {"key": "ELELENWO", "value": "ELELENWO"},
                        {"key": "OKPORO", "value": "OKPORO"},
                        {"key": "WOJI", "value": "WOJI"},
                        {"key": "RUMUOKORO", "value": "RUMUOKORO"},
                        {"key": "RUMUOKWUTA", "value": "RUMUOKWUTA"},
                        {"key": "MILE 3", "value": "MILE 3"},
                        {"key": "BOROKIRI", "value": "BOROKIRI"},
                        {"key": "MILE 1", "value": "MILE 1"},
                        {"key": "AGGREY", "value": "AGGREY"},
                        {"key": "CHOBA", "value": "CHOBA"},
                        {"key": "AHODA", "value": "AHODA"},
                        {"key": "ELELE", "value": "ELELE"},
                        {"key": "NORWAN", "value": "NORWAN"},
                        {"key": "UMUEBELE", "value": "UMUEBELE"},
                        {"key": "STADIUM ROAD", "value": "STADIUM ROAD"},
                        {"key": "STADIUM ROAD-SME", "value": "STADIUM ROAD-SME"},
                        {"key": "SOUTH-SOUTH ZONE ZONAL OFFICE", "value": "SOUTH-SOUTH ZONE ZONAL OFFICE"}
                    ],
                    "Abia": [
                        {"key": "", "value": ""},
                        {"key": "ASA", "value": "ASA"},
                        {"key": "FAULKS", "value": "FAULKS"},
                        {"key": "UZUAOKOLI", "value": "UZUAOKOLI"},
                        {"key": "OHAFIA", "value": "OHAFIA"},
                        {"key": "ISUOCHI", "value": "ISUOCHI"},
                        {"key": "ABRIBA", "value": "ABRIBA"},
                        {"key": "ISIKWATO", "value": "ISIKWATO"},
                        {"key": "UBAKALA", "value": "UBAKALA"},
                        {"key": "OSISIOMA", "value": "OSISIOMA"},
                        {"key": "ARIARIA", "value": "ARIARIA"},
                        {"key": "AROCHUKWU", "value": "AROCHUKWU"},
                        {"key": "FLYOVER", "value": "FLYOVER"},
                        {"key": "ABA", "value": "ABA"},
                        {"key": "SME SOUTH EAST", "value": "SME SOUTH EAST"}
                    ],
                    "Cross River": [
                        {"key": "", "value": ""},
                        {"key": "HARCOURT", "value": "HARCOURT"},
                        {"key": "MARIAN", "value": "MARIAN"},
                        {"key": "EKPO ABASI", "value": "EKPO ABASI"},
                        {"key": "IKOT ANSA", "value": "IKOT ANSA"},
                        {"key": "IKOM", "value": "IKOM"},
                        {"key": "UGEP", "value": "UGEP"},
                        {"key": "IGILI OGOJA", "value": "IGILI OGOJA"},
                        {"key": "OBUDU", "value": "OBUDU"},
                        {"key": "AKAMKPA", "value": "AKAMKPA"},
                        {"key": "HIGH-WAY", "value": "HIGH-WAY"},
                        {"key": "OBUBRA", "value": "OBUBRA"},
                        {"key": "IGILI OGOJA 2", "value": "IGILI OGOJA 2"},
                        {"key": "CALABAR ZONE ZONAL OFFICE", "value": "CALABAR ZONE ZONAL OFFICE"}
                    ],
                    "Akwa-Ibom": [
                        {"key": "", "value": ""},
                        {"key": "AKA ROAD", "value": "AKA ROAD"},
                        {"key": "ALDERTON", "value": "ALDERTON"},
                        {"key": "IKOT EKPENE", "value": "IKOT EKPENE"},
                        {"key": "ORON", "value": "ORON"},
                        {"key": "EKET 1", "value": "EKET 1"},
                        {"key": "EKET 2", "value": "EKET 2"},
                        {"key": "IKOT ABASI", "value": "IKOT ABASI"},
                        {"key": "ORON 2", "value": "ORON 2"},
                        {"key": "ABAK", "value": "ABAK"},
                        {"key": "NUNG-UDOE", "value": "NUNG-UDOE"},
                        {"key": "SME CALABAR", "value": "SME CALABAR"},
                        {"key": "CALABAR ZONE", "value": "CALABAR ZONE"},
                        {"key": "ETINAN", "value": "ETINAN"}
                    ],
                    "Oyo": [
                        {"key": "", "value": ""},
                        {"key": "OYO 1", "value": "OYO 1"},
                        {"key": "OYO 2", "value": "OYO 2"},
                        {"key": "MONIYA", "value": "MONIYA"},
                        {"key": "ILORA", "value": "ILORA"},
                        {"key": "BODIJA 2", "value": "BODIJA 2"},
                        {"key": "DUGBE", "value": "DUGBE"},
                        {"key": "ELEYELE", "value": "ELEYELE"},
                        {"key": "OJO", "value": "OJO"},
                        {"key": "ERUWA", "value": "ERUWA"},
                        {"key": "BODIJA 1", "value": "BODIJA 1"},
                        {"key": "APATA", "value": "APATA"},
                        {"key": "CHALLENGE", "value": "CHALLENGE"},
                        {"key": "MOKOLA", "value": "MOKOLA"},
                        {"key": "BEERE", "value": "BEERE"},
                        {"key": "OKE-ADO 2", "value": "OKE-ADO 2"},
                        {"key": "OKE-ADO 1", "value": "OKE-ADO 1"},
                        {"key": "OJA OBA", "value": "OJA OBA"},
                        {"key": "OLD IFE", "value": "OLD IFE"},
                        {"key": "ODINJO", "value": "ODINJO"},
                        {"key": "OLORUNSHOGO", "value": "OLORUNSHOGO"},
                        {"key": "ISEYIN", "value": "ISEYIN"},
                        {"key": "ISALE-OLA", "value": "ISALE-OLA"},
                        {"key": "SAKI", "value": "SAKI"},
                        {"key": "IWO ROAD 2", "value": "IWO ROAD 2"},
                        {"key": "IYANA CHURCH", "value": "IYANA CHURCH"},
                        {"key": "OKEHO", "value": "OKEHO"},
                        {"key": "IGBOHO", "value": "IGBOHO"},
                        {"key": "IGBOORA", "value": "IGBOORA"},
                        {"key": "LADOKE", "value": "LADOKE"},
                        {"key": "OLOOPE", "value": "OLOOPE"},
                        {"key": "ABAPANU", "value": "ABAPANU"}
                    ],
                    "Osun": [
                        {"key": "", "value": ""},
                        {"key": "IKIRE", "value": "IKIRE"},
                        {"key": "OGO OLUWA", "value": "OGO OLUWA"},
                        {"key": "ILA ORANGUN", "value": "ILA ORANGUN"},
                        {"key": "INISA", "value": "INISA"},
                        {"key": "ILESA 1", "value": "ILESA 1"},
                        {"key": "EDE", "value": "EDE"},
                        {"key": "ERIN OSUN", "value": "ERIN OSUN"},
                        {"key": "IBOKUN", "value": "IBOKUN"},
                        {"key": "ESTATE", "value": "ESTATE"},
                        {"key": "IFETEDO", "value": "IFETEDO"},
                        {"key": "MODAKEKE", "value": "MODAKEKE"},
                        {"key": "GBONGAN", "value": "GBONGAN"},
                        {"key": "IPETUMODU", "value": "IPETUMODU"},
                        {"key": "ARAROMI", "value": "ARAROMI"},
                        {"key": "OBATEDO", "value": "OBATEDO"},
                        {"key": "OBELAWO MEGA", "value": "OBELAWO MEGA"},
                        {"key": "OKEHO", "value": "OKEHO"},
                        {"key": "EFON-ALAYE", "value": "EFON-ALAYE"},
                        {"key": "IKIRUN", "value": "IKIRUN"},
                        {"key": "ILESA 2", "value": "ILESA 2"},
                        {"key": "IFE1 MEGA", "value": "IFE1 MEGA"},
                        {"key": "OLA", "value": "OLA"},
                        {"key": "OKE-EJIGBO", "value": "OKE-EJIGBO"},
                        {"key": "AYETAN", "value": "AYETAN"}
                    ],
                    "Enugu": [
                        {"key": "", "value": ""},
                        {"key": "AGBANI", "value": "AGBANI"},
                        {"key": "ZIK ROAD", "value": "ZIK ROAD"},
                        {"key": "NKANU", "value": "NKANU"},
                        {"key": "ORJI", "value": "ORJI"},
                        {"key": "9TH MILE", "value": "9TH MILE"},
                        {"key": "OBOLLO", "value": "OBOLLO"},
                        {"key": "ORBA", "value": "ORBA"},
                        {"key": "NSUKKA", "value": "NSUKKA"},
                        {"key": "OGBETE", "value": "OGBETE"},
                        {"key": "ABAKPA", "value": "ABAKPA"},
                        {"key": "EMENE", "value": "EMENE"},
                        {"key": "NSUKKA 2", "value": "NSUKKA 2"},
                        {"key": "ISHIAGU", "value": "ISHIAGU"},
                        {"key": "ORIFITE", "value": "ORIFITE"},
                        {"key": "ENUGU ZONE ZONAL OFFICE", "value": "ENUGU ZONE ZONAL OFFICE"}
                    ],
                    "Ebonyi": [
                        {"key": "", "value": ""},
                        {"key": "EBONYI MEGA", "value": "EBONYI MEGA"},
                        {"key": "OGOJA", "value": "OGOJA"},
                        {"key": "AFIKPO", "value": "AFIKPO"},
                        {"key": "ABAKALIKI", "value": "ABAKALIKI"},
                        {"key": "EZZAMGBO", "value": "EZZAMGBO"},
                        {"key": "ONUEKA", "value": "ONUEKA"},
                    ],
                    "Taraba": [
                        {"key": "", "value": ""},
                        {"key": "WUKARI", "value": "WUKARI"},
                        {"key": "HAMMARUWA", "value": "HAMMARUWA"},
                        {"key": "SABO JALINGO", "value": "SABO JALINGO"},
                        {"key": "BARDE", "value": "BARDE"},
                        {"key": "GEMBU", "value": "GEMBU"}
                    ],
                    "Kebbi": [
                        {"key": "", "value": ""},
                        {"key": "ZURU", "value": "ZURU"},
                        {"key": "YAURI", "value": "YAURI"},
                        {"key": "KEBBI 1", "value": "KEBBI 1"},
                        {"key": "KEBBI 2", "value": "KEBBI 2"},
                        {"key": "JEGA", "value": "JEGA"},
                        {"key": "ARGUNGU", "value": "ARGUNGU"},
                        {"key": "MAIYAMA", "value": "MAIYAMA"},
                        {"key": "BAGUDO", "value": "BAGUDO"}
                    ],
                    "Zamfara": [
                        {"key": "", "value": ""},
                        {"key": "GUSAU 1", "value": "GUSAU 1"},
                        {"key": "GUSAU 2", "value": "GUSAU 2"},
                        {"key": "KAURA NAMODA", "value": "KAURA NAMODA"},
                        {"key": "NORTH WEST ZONE ZONAL OFFICE", "value": "NORTH WEST ZONE ZONAL OFFICE"}
                    ],
                    "Jigawa": [
                        {"key": "", "value": ""},
                        {"key": "HADEJA", "value": "HADEJA"},
                        {"key": "DUTSE", "value": "DUTSE"},
                        {"key": "GUMEL", "value": "GUMEL"}
                    ],
                    "Sokoto": [
                        {"key": "", "value": ""},
                        {"key": "SOKOTO", "value": "SOKOTO"},
                        {"key": "ANGWAN ROGO", "value": "ANGWAN ROGO"},
                        {"key": "ILELLA", "value": "ILELLA"},
                        {"key": "DANDIMA", "value": "DANDIMA"},
                        {"key": "ISA", "value": "ISA"},
                        {"key": "TAMBUWAI", "value": "TAMBUWAI"},
                        {"key": "SABON BIRNI", "value": "SABON BIRNI"},
                        {"key": "BODINGA", "value": "BODINGA"}
                    ],
                    "Plateau": [
                        {"key": "", "value": ""},
                        {"key": "BUKURU", "value": "BUKURU"},
                        {"key": "FARINGADA", "value": "FARINGADA"},
                        {"key": "SHENDAM", "value": "SHENDAM"},
                        {"key": "TARAMINUS", "value": "TARAMINUS"},
                        {"key": "MANGU", "value": "MANGU"}
                    ],
                    "Bauchi": [
                        {"key": "", "value": ""},
                        {"key": "WUNTI", "value": "WUNTI"},
                        {"key": "YELWA", "value": "YELWA"},
                        {"key": "MURTALA MUHAMMED", "value": "MURTALA MUHAMMED"},
                        {"key": "AZARE", "value": "AZARE"},
                        {"key": "NORTH EAST ZONE ZONAL OFFICE", "value": "NORTH EAST ZONE ZONAL OFFICE"}
                    ],
                    "Gombe": [
                        {"key": "", "value": ""},
                        {"key": "BUBA YARO", "value": "BUBA YARO"},
                        {"key": "BANK ROAD", "value": "BANK ROAD"},
                        {"key": "DUKKU", "value": "DUKKU"}
                    ],
                    "Imo/Abia": [
                        {"key": "", "value": ""},
                        {"key": "SME SOUTH EAST", "value": "SME SOUTH EAST"}
                    ],
                    "Akwa-Ibom/Cross River":[
                        {"key": "", "value": ""},
                        {"key": "SME CALABAR", "value": "SME CALABAR"}
                    ],
                    "Kwara/Osun":[
                        {"key": "", "value": ""},
                         {"key": "SME SOUTH WEST", "value": "SME SOUTH WEST"}
                    ],
                    "Enugu/Anambra": [
                        {"key": "", "value": ""},
                        {"key": "NAIBAWA", "value": "NAIBAWA"},
                        {"key": "HOTORO", "value": "HOTORO"},
                        {"key": "DALA", "value": "DALA"},
                        {"key": "BOMPAI", "value": "BOMPAI"},
                        {"key": "SABO GARI", "value": "SABO GARI"},
                        {"key": "DAWANU", "value": "DAWANU"},
                        {"key": "DAMBATTA", "value": "DAMBATTA"},
                        {"key": "WUDIL", "value": "WUDIL"},
                        {"key": "RANO", "value": "RANO"},
                        {"key": "LAMINGO", "value": "LAMINGO"},
                        {"key": "SME KANO", "value": "SME KANO"},
                        {"key": "PANSHEKARA", "value": "PANSHEKARA"}
                    ],
                    "Abuja/Niger/Kaduna/Nassarawa": [
                        {"key": "", "value": ""},
                        {"key": "SME FCT", "value": "SME FCT"},
                        {"key": "SME FCT 2", "value": "SME FCT 2"}
                    ],
                    "Lagos": [
                        {"key": "", "value": ""},
                        {"key": "APOMU", "value": "APOMU"}
                    ],
                    "Lagos 1":[
                        {"key": "AJEGUNLE", "value": "AJEGUNLE"},
                        {"key": "AMUKOKO", "value": "AMUKOKO"},
                        {"key": "AMUWO", "value": "AMUWO"},
                        {"key": "WILMER", "value": "WILMER"},
                        {"key": "AGUDA", "value": "AGUDA"},
                        {"key": "IKATE", "value": "IKATE"},
                        {"key": "ITIRE", "value": "ITIRE"},
                        {"key": "ORILE", "value": "ORILE"},
                        {"key": "AJAH", "value": "AJAH"},
                        {"key": "AWOYAYA", "value": "AWOYAYA"},
                        {"key": "FORSYTHE", "value": "FORSYTHE"},
                        {"key": "IDI-ORO", "value": "IDI-ORO"},
                        {"key": "LAKOWE", "value": "LAKOWE"},
                        {"key": "ODI-OLOWO", "value": "ODI-OLOWO"},
                        {"key": "OYINGBO", "value": "OYINGBO"},
                        {"key": "PAPA AJAO", "value": "PAPA AJAO"},
                        {"key": "YABA", "value": "YABA"}
                    ],
                    "Lagos 2": [
                        {"key": "BADAGRY", "value": "BADAGRY"},
                        {"key": "OKO-AFOR", "value": "OKO-AFOR"},
                        {"key": "OWODE-APA", "value": "OWODE-APA"},
                        {"key": "IJANIKIN", "value": "IJANIKIN"},
                        {"key": "IKOTUN", "value": "IKOTUN"},
                        {"key": "EJIGBO", "value": "EJIGBO"},
                        {"key": "JAKANDE", "value": "JAKANDE"},
                        {"key": "IJEGUN", "value": "IJEGUN"},
                        {"key": "AJANGBADI", "value": "AJANGBADI"},
                        {"key": "ALABA", "value": "ALABA"},
                        {"key": "ILAJE", "value": "ILAJE"},
                        {"key": "IGBEDE", "value": "IGBEDE"},
                        {"key": "BAYIEKU", "value": "BAYIEKU"},
                        {"key": "ISOLO", "value": "ISOLO"},
                        {"key": "AGBARA", "value": "AGBARA"},
                        {"key": "IYANA SCHOOL", "value": "IYANA SCHOOL"},
                        {"key": "OKOKO", "value": "OKOKO"},
                        {"key": "LUSADA", "value": "LUSADA"}
                    ],
                    "Lagos 3": [
                        {"key": "AGBEDE", "value": "AGBEDE"},
                        {"key": "AGRIC", "value": "AGRIC"},
                        {"key": "ALAPERE", "value": "ALAPERE"},
                        {"key": "BARIGA", "value": "BARIGA"},
                        {"key": "EBUTE", "value": "EBUTE"},
                        {"key": "EPE", "value": "EPE"},
                        {"key": "GBAGADA", "value": "GBAGADA"},
                        {"key": "IKOSI", "value": "IKOSI"},
                        {"key": "IMOTA", "value": "IMOTA"},
                        {"key": "MAGBON", "value": "MAGBON"},
                        {"key": "MILE 12 - 1", "value": "MILE 12 - 1"},
                        {"key": "MILE 12 - 2", "value": "MILE 12 - 2"},
                        {"key": "OBANIKORO", "value": "OBANIKORO"},
                        {"key": "OJOTA", "value": "OJOTA"},
                        {"key": "ONIPANU", "value": "ONIPANU"},
                        {"key": "OPEBI", "value": "OPEBI"},
                        {"key": "IGBOGBO", "value": "IGBOGBO"},
                        {"key": "IJEDE", "value": "IJEDE"},
                        {"key": "IKORODU 1", "value": "IKORODU 1"},
                        {"key": "IKORODU 2", "value": "IKORODU 2"},
                        {"key": "ODOGUNYAN", "value": "ODOGUNYAN"}
                    ],
                    "Lagos 4": [
                        {"key": "AGEGE", "value": "AGEGE"},
                        {"key": "DOPEMU", "value": "DOPEMU"},
                        {"key": "IKEJA 1", "value": "IKEJA 1"},
                        {"key": "IKEJA 2", "value": "IKEJA 2"},
                        {"key": "ISHAGA", "value": "ISHAGA"},
                        {"key": "MAFOLUKU", "value": "MAFOLUKU"},
                        {"key": "OGBA", "value": "OGBA"},
                        {"key": "OJODU", "value": "OJODU"},
                        {"key": "OKO-OBA", "value": "OKO-OBA"},
                        {"key": "OSHODI", "value": "OSHODI"},
                        {"key": "AKUTE", "value": "AKUTE"},
                        {"key": "IBAFO", "value": "IBAFO"},
                        {"key": "MATOGUN", "value": "MATOGUN"},
                        {"key": "MOWE", "value": "MOWE"},
                        {"key": "OKE-ARO", "value": "OKE-ARO"},
                        {"key": "OPE ILU", "value": "OPE ILU"},
                        {"key": "IJOKO", "value": "IJOKO"}
                    ],
                    "Lagos 5": [
                        {"key": "EBGEDA 1", "value": "EBGEDA 1"},
                        {"key": "EBGEDA 2", "value": "EBGEDA 2"},
                        {"key": "ITORI", "value": "ITORI"},
                        {"key": "BARUWA", "value": "BARUWA"},
                        {"key": "IPAJA", "value": "IPAJA"},
                        {"key": "AYOBO", "value": "AYOBO"},
                        {"key": "OKE ODO", "value": "OKE ODO"},
                        {"key": "ALAGBADO", "value": "ALAGBADO"},
                        {"key": "ABULEGBA", "value": "ABULEGBA"},
                        {"key": "SHASHA", "value": "SHASHA"},
                        {"key": "IGBOGILA", "value": "IGBOGILA"},
                        {"key": "DALEMO", "value": "DALEMO"},
                        {"key": "IFO", "value": "IFO"},
                        {"key": "IYANA-ILOGBO", "value": "IYANA-ILOGBO"},
                        {"key": "OJUORE", "value": "OJUORE"},
                        {"key": "OWODE", "value": "OWODE"},
                        {"key": "SANGO", "value": "SANGO"},
                        {"key": "SANGO 2", "value": "SANGO 2"},
                        {"key": "ILARO", "value": "ILARO"},
                        {"key": "IDI-IROKO", "value": "IDI-IROKO"},
                        {"key": "ATAN", "value": "ATAN"}
                    ]
                };

                const branchesEmailsOptions = {
                    "ABEOKUTA": [
                    {"key": "abeokuta@lapo-nigeria.org", "value": "abeokuta@lapo-nigeria.org"}
                    ],
                    "ADO EKITI": [
                    {"key": "adoekiti@lapo-nigeria.org", "value": "adoekiti@lapo-nigeria.org"}
                    ],
                    "AKURE": [
                    {"key": "akure@lapo-nigeria.org", "value": "akure@lapo-nigeria.org"}
                    ],
                    "CALABAR ZONE": [
                    {"key": "calabarzone@lapo-nigeria.org", "value": "calabarzone@lapo-nigeria.org"}
                    ],
                    "ABAK": [
                    {"key": "abak@lapo-nigeria.org", "value": "abak@lapo-nigeria.org"}
                    ],
                    "AKAMKPA": [
                    {"key": "akamkpa@lapo-nigeria.org", "value": "akamkpa@lapo-nigeria.org"}
                    ],
                    "AKA ROAD": [
                    {"key": "aka.rd@lapo-nigeria.org", "value": "aka.rd@lapo-nigeria.org"}
                    ],
                    "ALDERTON": [
                    {"key": "alderton@lapo-nigeria.org", "value": "alderton@lapo-nigeria.org"}
                    ],
                    "EKET 1": [
                    {"key": "eket1@lapo-nigeria.org", "value": "eket1@lapo-nigeria.org"}
                    ],
                    "EKET 2": [
                    {"key": "eket2@lapo-nigeria.org", "value": "eket2@lapo-nigeria.org"}
                    ],
                    "EKPO ABASI": [
                    {"key": "ekpo.abasi@lapo-nigeria.org", "value": "ekpo.abasi@lapo-nigeria.org"}
                    ],
                    "ETINAN": [
                    {"key": "lapoetinanubium@yahoo.com", "value": "lapoetinanubium@yahoo.com"}
                    ],
                    "HARCOURT": [
                    {"key": "harcourt@lapo-nigeria.org", "value": "harcourt@lapo-nigeria.org"}
                    ],
                    "HIGH-WAY": [
                    {"key": "highway@lapo-nigeria.org", "value": "highway@lapo-nigeria.org"}
                    ],
                    "IGILI OGOJA 1": [
                    {"key": "igili.ogoja@lapo-nigeria.org", "value": "igili.ogoja@lapo-nigeria.org"}
                    ],
                    "IGILI OGOJA 2": [
                    {"key": "igili.ogoja2@lapo-nigeria.org", "value": "igili.ogoja2@lapo-nigeria.org"}
                    ],
                    "IKOM": [
                    {"key": "ikom@lapo-nigeria.org", "value": "ikom@lapo-nigeria.org"}
                    ],
                    "IKOT ABASI": [
                    {"key": "ikot.abasi@lapo-nigeria.org", "value": "ikot.abasi@lapo-nigeria.org"}
                    ],
                    "IKOT ANSA": [
                    {"key": "ikot.ansa@lapo-nigeria.org", "value": "ikot.ansa@lapo-nigeria.org"}
                    ],
                    "IKOT-EKPENE ROAD": [
                    {"key": "ikot.ekpene@lapo-nigeria.org", "value": "ikot.ekpene@lapo-nigeria.org"}
                    ],
                    "MARIAN": [
                    {"key": "marian@lapo-nigeria.org", "value": "marian@lapo-nigeria.org"}
                    ],
                    "NUNG-UDOE": [
                    {"key": "nung.udoe@lapo-nigeria.org", "value": "nung.udoe@lapo-nigeria.org"}
                    ],
                    "OBUBRA": [
                    {"key": "obubra@lapo-nigeria.org", "value": "obubra@lapo-nigeria.org"}
                    ],
                    "OBUDU": [
                    {"key": "obudu@lapo-nigeria.org", "value": "obudu@lapo-nigeria.org"}
                    ],
                    "ORON 1": [
                    {"key": "oron@lapo-nigeria.org", "value": "oron@lapo-nigeria.org"}
                    ],
                    "ORON 2": [
                    {"key": "oron2@lapo-nigeria.org", "value": "oron2@lapo-nigeria.org"}
                    ],
                    "UGEP": [
                    {"key": "ugep@lapo-nigeria.org", "value": "ugep@lapo-nigeria.org"}
                    ],
                    "DELTA ZONE": [
                    {"key": "deltazone@lapo-nigeria.org", "value": "deltazone@lapo-nigeria.org"}
                    ],
                    "ABRAKA": [
                    {"key": "abraka@lapo-nigeria.org", "value": "abraka@lapo-nigeria.org"}
                    ],
                    "AGBARO": [
                    {"key": "agbaro@lapo-nigeria.org", "value": "agbaro@lapo-nigeria.org"}
                    ],
                    "AGBOR 1": [
                    {"key": "agbor@lapo-nigeria.org", "value": "agbor@lapo-nigeria.org"}
                    ],
                    "AGBOR 2": [
                    {"key": "agbor2@lapo-nigeria.org", "value": "agbor2@lapo-nigeria.org"}
                    ],
                    "AKENFA": [
                    {"key": "akenfa@lapo-nigeria.org", "value": "akenfa@lapo-nigeria.org"}
                    ],
                    "AMASSOMA": [
                    {"key": "amassoma@lapo-nigeria.org", "value": "amassoma@lapo-nigeria.org"}
                    ],
                    "AMUKPE": [
                    {"key": "amukpe@lapo-nigeria.org", "value": "amukpe@lapo-nigeria.org"}
                    ],
                    "ASABA 1": [
                    {"key": "asaba@lapo-nigeria.org", "value": "asaba@lapo-nigeria.org"}
                    ],
                    "ASABA 2": [
                    {"key": "asaba2@lapo-nigeria.org", "value": "asaba2@lapo-nigeria.org"}
                    ],
                    "ASABA 3": [
                    {"key": "asaba3@lapo-nigeria.org", "value": "asaba3@lapo-nigeria.org"}
                    ],
                    "AZIKORO": [
                    {"key": "azikoro@lapo-nigeria.org", "value": "azikoro@lapo-nigeria.org"}
                    ],
                    "EKIUGBO": [
                    {"key": "ekiugbo@lapo-nigeria.org", "value": "ekiugbo@lapo-nigeria.org"}
                    ],
                    "IGBOGENE": [
                    {"key": "igbogene@lapo-nigeria.org", "value": "igbogene@lapo-nigeria.org"}
                    ],
                    "ISSELE-UKU": [
                    {"key": "Issele.uku@lapo-nigeria.org", "value": "Issele.uku@lapo-nigeria.org"}
                    ],
                    "OGHARA": [
                    {"key": "oghara@lapo-nigeria.org", "value": "oghara@lapo-nigeria.org"}
                    ],
                    "OGUNU": [
                    {"key": "ogunu@lapo-nigeria.org", "value": "ogunu@lapo-nigeria.org"}
                    ],
                    "OGWASHI-UKU": [
                    {"key": "ogwashi.uku@lapo-nigeria.org", "value": "ogwashi.uku@lapo-nigeria.org"}
                    ],
                    "OLEH": [
                    {"key": "oleh@lapo-nigeria.org", "value": "oleh@lapo-nigeria.org"}
                    ],
                    "OPOLO": [
                    {"key": "opolo@lapo-nigeria.org", "value": "opolo@lapo-nigeria.org"}
                    ],
                    "OTUOKE": [
                    {"key": "otuoke@lapo-nigeria.org", "value": "otuoke@lapo-nigeria.org"}
                    ],
                    "OZORO": [
                    {"key": "ozoro@lapo-nigeria.org", "value": "ozoro@lapo-nigeria.org"}
                    ],
                    "PATANI": [
                    {"key": "patani@lapo-nigeria.org", "value": "patani@lapo-nigeria.org"}
                    ],
                    "SAPELE": [
                    {"key": "sapele@lapo-nigeria.org", "value": "sapele@lapo-nigeria.org"}
                    ],
                    "SWALI": [
                    {"key": "swali@lapo-nigeria.org", "value": "swali@lapo-nigeria.org"}
                    ],
                    "UDU": [
                    {"key": "udu@lapo-nigeria.org", "value": "udu@lapo-nigeria.org"}
                    ],
                    "UGHELLI": [
                    {"key": "ughelli@lapo-nigeria.org", "value": "ughelli@lapo-nigeria.org"}
                    ],
                    "WARRI 1": [
                    {"key": "warri1@lapo-nigeria.org", "value": "warri1@lapo-nigeria.org"}
                    ],
                    "WARRI 2": [
                    {"key": "warri2@lapo-nigeria.org", "value": "warri2@lapo-nigeria.org"}
                    ],
                    "WARRI 3": [
                    {"key": "warri3@lapo-nigeria.org", "value": "warri3@lapo-nigeria.org"}
                    ],
                    "WARRI 4": [
                    {"key": "warri4@lapo-nigeria.org", "value": "warri4@lapo-nigeria.org"}
                    ],
                    "EDO ZONE": [
                    {"key": "edozone@lapo-nigeria.org", "value": "edozone@lapo-nigeria.org"}
                    ],
                    "ADESOGBE": [
                    {"key": "adesogbe@lapo-nigeria.org", "value": "adesogbe@lapo-nigeria.org"}
                    ],
                    "ADUWAWA": [
                    {"key": "aduwawa@lapo-nigeria.org", "value": "aduwawa@lapo-nigeria.org"}
                    ],
                    "AGENEGBODE": [
                    {"key": "agenegbode@lapo-nigeria.org", "value": "agenegbode@lapo-nigeria.org"}
                    ],
                    "AUCHI": [
                    {"key": "auchi@lapo-nigeria.org", "value": "auchi@lapo-nigeria.org"}
                    ],
                    "AUCHI 2": [
                    {"key": "auchi2@lapo-nigeria.org", "value": "auchi2@lapo-nigeria.org"}
                    ],
                    "BENIN 1": [
                    {"key": "benin1@lapo-nigeria.org", "value": "benin1@lapo-nigeria.org"}
                    ],
                    "BENIN 2": [
                    {"key": "benin2@lapo-nigeria.org", "value": "benin2@lapo-nigeria.org"}
                    ],
                    "DAWSON": [
                    {"key": "edls.dawson@lapo-nigeria.org", "value": "edls.dawson@lapo-nigeria.org"}
                    ],
                    "EGOR": [
                    {"key": "egor@lapo-nigeria.org", "value": "egor@lapo-nigeria.org"}
                    ],
                    "EKENWAN ROAD": [
                    {"key": "edls.ekenwuan@lapo-nigeria.org", "value": "edls.ekenwuan@lapo-nigeria.org"}
                    ],
                    "EKPOMA": [
                    {"key": "ekpoma@lapo-nigeria.org", "value": "ekpoma@lapo-nigeria.org"}
                    ],
                    "EVBUOTUBU": [
                    {"key": "evbuotubu@lapo-nigeria.org", "value": "evbuotubu@lapo-nigeria.org"}
                    ],
                    "FIRST EAST CIRCULAR": [
                    {"key": "edls.1st@lapo-nigeria.org", "value": "edls.1st@lapo-nigeria.org"}
                    ],
                    "FUGAR": [
                    {"key": "fugar@lapo-nigeria.org", "value": "fugar@lapo-nigeria.org"}
                    ],
                    "IDOGBO": [
                    {"key": "idogbo@lapo-nigeria.org", "value": "idogbo@lapo-nigeria.org"}
                    ],
                    "IGARRA": [
                    {"key": "igarra@lapo-nigeria.org", "value": "igarra@lapo-nigeria.org"}
                    ],
                    "IKPOBA-HILL": [
                    {"key": "ikpoba.hill@lapo-nigeria.org", "value": "ikpoba.hill@lapo-nigeria.org"}
                    ],
                    "MISSION ROAD": [
                    {"key": "mission.road@lapo-nigeria.org", "value": "mission.road@lapo-nigeria.org"}
                    ],
                    "OGHEDE": [
                    {"key": "oghede@lapo-nigeria.org", "value": "oghede@lapo-nigeria.org"}
                    ],
                    "OKA": [
                    {"key": "oka@lapo-nigeria.org", "value": "oka@lapo-nigeria.org"}
                    ],
                    "OKADA": [
                    {"key": "okada@lapo-nigeria.org", "value": "okada@lapo-nigeria.org"}
                    ],
                    "OKO": [
                    {"key": "oko@lapo-nigeria.org", "value": "oko@lapo-nigeria.org"}
                    ],
                    "SAPELE ROAD": [
                    {"key": "sapele.road@lapo-nigeria.org", "value": "sapele.road@lapo-nigeria.org"}
                    ],
                    "UBIAJA": [
                    {"key": "ubiaja@lapo-nigeria.org", "value": "ubiaja@lapo-nigeria.org"}
                    ],
                    "UGBOWO 1": [
                    {"key": "ugbowo1@lapo-nigeria.org", "value": "ugbowo1@lapo-nigeria.org"}
                    ],
                    "UGBOWO 2": [
                    {"key": "ugbowo2@lapo-nigeria.org", "value": "ugbowo2@lapo-nigeria.org"}
                    ],
                    "UPPER SOKPONBA": [
                    {"key": "upper.sakponba@lapo-nigeria.org", "value": "upper.sakponba@lapo-nigeria.org"}
                    ],
                    "UROMI": [
                    {"key": "uromi@lapo-nigeria.org", "value": "uromi@lapo-nigeria.org"}
                    ],
                    "USELU": [
                    {"key": "edls.uselu@lapo-nigeria.org", "value": "edls.uselu@lapo-nigeria.org"}
                    ],
                    "UWELU": [
                    {"key": "uwelu@lapo-nigeria.org", "value": "uwelu@lapo-nigeria.org"}
                    ],
                    "ENUGU ZONE": [
                    {"key": "enuguzone@lapo-nigeria.org", "value": "enuguzone@lapo-nigeria.org"}
                    ],
                    "9TH MILE": [
                    {"key": "9th.Mile@lapo-nigeria.org", "value": "9th.Mile@lapo-nigeria.org"}
                    ],
                    "ABAGANA": [
                    {"key": "abagana@lapo-nigeria.org", "value": "abagana@lapo-nigeria.org"}
                    ],
                    "ABAKALIKI": [
                    {"key": "abakaliki@lapo-nigeria.org", "value": "abakaliki@lapo-nigeria.org"}
                    ],
                    "ABAKPA": [
                    {"key": "abakpa@lapo-nigeria.org", "value": "abakpa@lapo-nigeria.org"}
                    ],
                    "AFIKPO": [
                    {"key": "afikpo@lapo-nigeria.org", "value": "afikpo@lapo-nigeria.org"}
                    ],
                    "AGBANI": [
                    {"key": "agbani@lapo-nigeria.org", "value": "agbani@lapo-nigeria.org"}
                    ],
                    "AGULERI": [
                    {"key": "aguleri@lapo-nigeria.org", "value": "aguleri@lapo-nigeria.org"}
                    ],
                    "AROMA": [
                    {"key": "aroma@lapo-nigeria.org", "value": "aroma@lapo-nigeria.org"}
                    ],
                    "AWKA": [
                    {"key": "awka@lapo-nigeria.org", "value": "awka@lapo-nigeria.org"}
                    ],
                    "EBONYI": [
                    {"key": "ebonyi@lapo-nigeria.org", "value": "ebonyi@lapo-nigeria.org"}
                    ],
                    "EKWULOBIA": [
                    {"key": "ekwulobia@lapo-nigeria.org", "value": "ekwulobia@lapo-nigeria.org"}
                    ],
                    "EMENE": [
                    {"key": "emene@lapo-nigeria.org", "value": "emene@lapo-nigeria.org"}
                    ],
                    "EZZAMGBO": [
                    {"key": "ezzamgbo@lapo-nigeria.org", "value": "ezzamgbo@lapo-nigeria.org"}
                    ],
                    "IHIALA": [
                    {"key": "ihiala@lapo-nigeria.org", "value": "ihiala@lapo-nigeria.org"}
                    ],
                    "ISHIAGU": [
                    {"key": "amorji.nike@lapo-nigeria.org", "value": "amorji.nike@lapo-nigeria.org"}
                    ],
                    "IWEKA": [
                    {"key": "iweka@lapo-nigeria.org", "value": "iweka@lapo-nigeria.org"}
                    ],
                    "NKANU": [
                    {"key": "nkanu@lapo-nigeria.org", "value": "nkanu@lapo-nigeria.org"}
                    ],
                    "NKWELLE": [
                    {"key": "nkwelle@lapo-nigeria.org", "value": "nkwelle@lapo-nigeria.org"}
                    ],
                    "NNEWI": [
                    {"key": "nnewi@lapo-nigeria.org", "value": "nnewi@lapo-nigeria.org"}
                    ],
                    "NSUKKA": [
                    {"key": "nsukka@lapo-nigeria.org", "value": "nsukka@lapo-nigeria.org"}
                    ],
                    "NSUKKA 2": [
                    {"key": "nsukka2@lapo-nigeria.org", "value": "nsukka2@lapo-nigeria.org"}
                    ],
                    "OBOLLO": [
                    {"key": "obollo@lapo-nigeria.org", "value": "obollo@lapo-nigeria.org"}
                    ],
                    "OBOSI": [
                    {"key": "obosi@lapo-nigeria.org", "value": "obosi@lapo-nigeria.org"}
                    ],
                    "OCHANJA": [
                    {"key": "ochanja@lapo-nigeria.org", "value": "ochanja@lapo-nigeria.org"}
                    ],
                    "OGBETE": [
                    {"key": "ogbete@lapo-nigeria.org", "value": "ogbete@lapo-nigeria.org"}
                    ],
                    "OGBUEFURE": [
                    {"key": "ogbuefere@lapo-nigeria.org", "value": "ogbuefere@lapo-nigeria.org"}
                    ],
                    "OGIDI": [
                    {"key": "ogidi@lapo-nigeria.org", "value": "ogidi@lapo-nigeria.org"}
                    ],
                    "OGOJA": [
                    {"key": "ogoja@lapo-nigeria.org", "value": "ogoja@lapo-nigeria.org"}
                    ],
                    "OKPOKO": [
                    {"key": "okpoko@lapo-nigeria.org", "value": "okpoko@lapo-nigeria.org"}
                    ],
                    "ONUEKA": [
                    {"key": "onueka@lapo-nigeria.org", "value": "onueka@lapo-nigeria.org"}
                    ],
                    "ORBA": [
                    {"key": "orba@lapo-nigeria.org", "value": "orba@lapo-nigeria.org"}
                    ],
                    "ORIFITE": [
                    {"key": "umuzocha@lapo-nigeria.org", "value": "umuzocha@lapo-nigeria.org"}
                    ],
                    "ORJI": [
                    {"key": "orji@lapo-nigeria.org", "value": "orji@lapo-nigeria.org"}
                    ],
                    "UKPOR": [
                    {"key": "ukpor@lapo-nigeria.org", "value": "ukpor@lapo-nigeria.org"}
                    ],
                    "UMUZE": [
                    {"key": "Umuze@lapo-nigeria.org", "value": "Umuze@lapo-nigeria.org"}
                    ],
                    "ZIK ROAD": [
                    {"key": "zik.road@lapo-nigeria.org", "value": "zik.road@lapo-nigeria.org"}
                    ],
                    "FCT ZONE": [
                    {"key": "fct@lapo-nigeria.org", "value": "fct@lapo-nigeria.org"}
                    ],
                    "ABAJI": [
                    {"key": "abaji@lapo-nigeria.org", "value": "abaji@lapo-nigeria.org"}
                    ],
                    "AHMADU BELLO": [
                    {"key": "ahmadu.bello@lapo-nigeria.org", "value": "ahmadu.bello@lapo-nigeria.org"}
                    ],
                    "AKWANGA": [
                    {"key": "akwanga@lapo-nigeria.org", "value": "akwanga@lapo-nigeria.org"}
                    ],
                    "BARNAWA": [
                    {"key": "barnawa@lapo-nigeria.org", "value": "barnawa@lapo-nigeria.org"}
                    ],
                    "BIDA": [
                    {"key": "bida@lapo-nigeria.org", "value": "bida@lapo-nigeria.org"}
                    ],
                    "BWARI": [
                    {"key": "bwari@lapo-nigeria.org", "value": "bwari@lapo-nigeria.org"}
                    ],
                    "DOMA": [
                    {"key": "doma@lapo-nigeria.org", "value": "doma@lapo-nigeria.org"}
                    ],
                    "GONI GORA": [
                    {"key": "gonigora@lapo-nigeria.org", "value": "gonigora@lapo-nigeria.org"}
                    ],
                    "GWAGWALADA": [
                    {"key": "gwagwalada@lapo-nigeria.org", "value": "gwagwalada@lapo-nigeria.org"}
                    ],
                    "KACHIA": [
                    {"key": "kachia@lapo-nigeria.org", "value": "kachia@lapo-nigeria.org"}
                    ],
                    "KADO": [
                    {"key": "kado@lapo-nigeria.org", "value": "kado@lapo-nigeria.org"}
                    ],
                    "KAFANCHAN": [
                    {"key": "kafanchan@lapo-nigeria.org", "value": "kafanchan@lapo-nigeria.org"}
                    ],
                    "KAINJI": [
                    {"key": "new.bussa@lapo-nigeria.org", "value": "new.bussa@lapo-nigeria.org"}
                    ],
                    "KAKURI": [
                    {"key": "kakuri@lapo-nigeria.org", "value": "kakuri@lapo-nigeria.org"}
                    ],
                    "KARU": [
                    {"key": "karu@lapo-nigeria.org", "value": "karu@lapo-nigeria.org"}
                    ],
                    "KAWO": [
                    {"key": "kawo@lapo-nigeria.org", "value": "kawo@lapo-nigeria.org"}
                    ],
                    "KEFFI": [
                    {"key": "keffi@lapo-nigeria.org", "value": "keffi@lapo-nigeria.org"}
                    ],
                    "KONTAGORA": [
                    {"key": "kontagora@lapo-nigeria.org", "value": "kontagora@lapo-nigeria.org"}
                    ],
                    "KUBWA": [
                    {"key": "kubwa@lapo-nigeria.org", "value": "kubwa@lapo-nigeria.org"}
                    ],
                    "KUJE": [
                    {"key": "kuje@lapo-nigeria.org", "value": "kuje@lapo-nigeria.org"}
                    ],
                    "LAFIA": [
                    {"key": "lafia@lapo-nigeria.org", "value": "lafia@lapo-nigeria.org"}
                    ],
                    "LAPAI": [
                    {"key": "lapai@lapo-nigeria.org", "value": "lapai@lapo-nigeria.org"}
                    ],
                    "MINNA 1": [
                    {"key": "minna1@lapo-nigeria.org", "value": "minna1@lapo-nigeria.org"}
                    ],
                    "MINNA 2": [
                    {"key": "minna2@lapo-nigeria.org", "value": "minna2@lapo-nigeria.org"}
                    ],
                    "MOKWA": [
                    {"key": "mokwa@lapo-nigeria.org", "value": "mokwa@lapo-nigeria.org"}
                    ],
                    "NASARAWA": [
                    {"key": "nasarawa@lapo-nigeria.org", "value": "nasarawa@lapo-nigeria.org"}
                    ],
                    "NEW KARU": [
                    {"key": "newkaru@lapo-nigeria.org", "value": "newkaru@lapo-nigeria.org"}
                    ],
                    "NNAMDI AZIKIWE": [
                    {"key": "nnamdi.azikiwe@lapo-nigeria.org", "value": "nnamdi.azikiwe@lapo-nigeria.org"}
                    ],
                    "NYANYAN": [
                    {"key": "nyanyan@lapo-nigeria.org", "value": "nyanyan@lapo-nigeria.org"}
                    ],
                    "SABO 2": [
                    {"key": "sabo2@lapo-nigeria.org", "value": "sabo2@lapo-nigeria.org"}
                    ],
                    "SABO TASHA": [
                    {"key": "sabo.tasha@lapo-nigeria.org", "value": "sabo.tasha@lapo-nigeria.org"}
                    ],
                    "SAMINAKA": [
                    {"key": "saminaka@lapo-nigeria.org", "value": "saminaka@lapo-nigeria.org"}
                    ],
                    "SULEJA": [
                    {"key": "suleja@lapo-nigeria.org", "value": "suleja@lapo-nigeria.org"}
                    ],
                    "WUSE": [
                    {"key": "wuse@lapo-nigeria.org", "value": "wuse@lapo-nigeria.org"}
                    ],
                    "ZARIA 1": [
                    {"key": "zaria1@lapo-nigeria.org", "value": "zaria1@lapo-nigeria.org"}
                    ],
                    "ZARIA 2": [
                    {"key": "zaria2@lapo-nigeria.org", "value": "zaria2@lapo-nigeria.org"}
                    ],
                    "ZUBA": [
                    {"key": "zuba@lapo-nigeria.org", "value": "zuba@lapo-nigeria.org"}
                    ],
                    "LAGOS CENTRAL ZONE": [
                    {"key": "lagos.central@lapo-nigeria.org", "value": "lagos.central@lapo-nigeria.org"}
                    ],
                    "ABULEGBA": [
                    {"key": "abulegba@lapo-nigeria.org", "value": "abulegba@lapo-nigeria.org"}
                    ],
                    "AGBARA": [
                    {"key": "agbara@lapo-nigeria.org", "value": "agbara@lapo-nigeria.org"}
                    ],
                    "AJAGBADI": [
                    {"key": "ajagbadi@lapo-nigeria.org", "value": "ajagbadi@lapo-nigeria.org"}
                    ],
                    "ALABA": [
                    {"key": "alaba@lapo-nigeria.org", "value": "alaba@lapo-nigeria.org"}
                    ],
                    "ALAGBADO": [
                    {"key": "alagbado@lapo-nigeria.org", "value": "alagbado@lapo-nigeria.org"}
                    ],
                    "ATAN": [
                    {"key": "atan@lapo-nigeria.org", "value": "atan@lapo-nigeria.org"}
                    ],
                    "AYOBO": [
                    {"key": "ayobo@lapo-nigeria.org", "value": "ayobo@lapo-nigeria.org"}
                    ],
                    "BADAGRY": [
                    {"key": "badagry@lapo-nigeria.org", "value": "badagry@lapo-nigeria.org"}
                    ],
                    "BARUWA": [
                    {"key": "baruwa@lapo.nigeria.org", "value": "baruwa@lapo.nigeria.org"}
                    ],
                    "BAYEIKU": [
                    {"key": "bayeiku@lapo.nigeria.org", "value": "bayeiku@lapo.nigeria.org"}
                    ],
                    "DALEMO": [
                    {"key": "dalemo@lapo-nigeria.org", "value": "dalemo@lapo-nigeria.org"}
                    ],
                    "EGBEDA 1": [
                    {"key": "edls.egbeda@lapo-nigeria.org", "value": "edls.egbeda@lapo-nigeria.org"}
                    ],
                    "EGBEDA 2": [
                    {"key": "egbeda@lapo-nigeria.org", "value": "egbeda@lapo-nigeria.org"}
                    ],
                    "EJIGBO": [
                    {"key": "ejigbo@lapo-nigeria.org", "value": "ejigbo@lapo-nigeria.org"}
                    ],
                    "IDI-IROKO": [
                    {"key": "idi.iroko@lapo-nigeria.org", "value": "idi.iroko@lapo-nigeria.org"}
                    ],
                    "IFO": [
                    {"key": "ifo@lapo-nigeria.org", "value": "ifo@lapo-nigeria.org"}
                    ],
                    "IGANDO": [
                    {"key": "igando@lapo-nigeria.org", "value": "igando@lapo-nigeria.org"}
                    ],
                    "IGBEDE": [
                    {"key": "igbede@lapo-nigeria.org", "value": "igbede@lapo-nigeria.org"}
                    ],
                    "IGBOGILA": [
                    {"key": "igbogila@lapo-nigeria.org", "value": "igbogila@lapo-nigeria.org"}
                    ],
                    "IJANIKIN": [
                    {"key": "ijanikin@lapo-nigeria.org", "value": "ijanikin@lapo-nigeria.org"}
                    ],
                    "IJEGUN": [
                    {"key": "ijegun@lapo-nigeria.org", "value": "ijegun@lapo-nigeria.org"}
                    ],
                    "IKOTUN": [
                    {"key": "ikotun@lapo-nigeria.org", "value": "ikotun@lapo-nigeria.org"}
                    ],
                    "ILAJE": [
                    {"key": "ilaje@lapo-nigeria.org", "value": "ilaje@lapo-nigeria.org"}
                    ],
                    "ILARO": [
                    {"key": "illaro@lapo-nigeria.org", "value": "illaro@lapo-nigeria.org"}
                    ],
                    "IPAJA": [
                    {"key": "ipaja@lapo-nigeria.org", "value": "ipaja@lapo-nigeria.org"}
                    ],
                    "ISOLO": [
                    {"key": "isolo@lapo-nigeria.org", "value": "isolo@lapo-nigeria.org"}
                    ],
                    "ITORI": [
                    {"key": "Itori@lapo-nigeria.org", "value": "Itori@lapo-nigeria.org"}
                    ],
                    "IYANA-ILOGBO": [
                    {"key": "iyana.ilogbo@lapo-nigeria.org", "value": "iyana.ilogbo@lapo-nigeria.org"}
                    ],
                    "IYANA SCHOOL": [
                    {"key": "iyana.school@lapo-nigeria.org", "value": "iyana.school@lapo-nigeria.org"}
                    ],
                    "JAKANDE": [
                    {"key": "jakande@lapo-nigeria.org", "value": "jakande@lapo-nigeria.org"}
                    ], 
                    "LUSADA": [
                    {"key": "lusada@lapo-nigeria.org", "value": "lusada@lapo-nigeria.org"}
                    ],
                    "OJUORE": [
                    {"key": "oju.ore@lapo-nigeria.org", "value": "oju.ore@lapo-nigeria.org"}
                    ],
                    "OKE-ODO": [
                    {"key": "oke.odo@lapo-nigeria.org", "value": "oke.odo@lapo-nigeria.org"}
                    ],
                    "OKO-AFO": [
                    {"key": "oke.odo@lapo-nigeria.org", "value": "oke.odo@lapo-nigeria.org"}
                    ],
                    "OKOKO": [
                        {"key": "okoko@lapo-nigeria.org", "value": "okoko@lapo-nigeria.org"}
                    ],
                    "OWODE": [
                        {"key": "owode@lapo-nigeria.org", "value": "owode@lapo-nigeria.org"}
                    ],
                    "OWODE-APA": [
                        {"key": "owode.apa@lapo-nigeria.org", "value": "owode.apa@lapo-nigeria.org"}
                    ],
                    "SANGO 2": [
                    {"key": "sango2@lapo-nigeria.org", "value": "sango2@lapo-nigeria.org"}
                    ],
                    "SANGO OTTA": [
                    {"key": "sango.ota@lapo-nigeria.org", "value": "sango.ota@lapo-nigeria.org"}
                    ],
                    "SHASHA": [
                    {"key": "shasha@lapo-nigeria.org", "value": "shasha@lapo-nigeria.org"}
                    ],
                    "LAGOS MAINLAND ZONE": [
                    {"key": "lagos.mainland@lapo-nigeria.org", "value": "lagos.mainland@lapo-nigeria.org"}
                    ],
                    "ABULE-ADO": [
                    {"key": "abule.ado@lapo-nigeria.org", "value": "abule.ado@lapo-nigeria.org"}
                    ],
                    "AGBEDE": [
                    {"key": "agbede@lapo-nigeria.org", "value": "agbede@lapo-nigeria.org"}
                    ],
                    "AGRIC": [
                    {"key": "agric@lapo-nigeria.org", "value": "agric@lapo-nigeria.org"}
                    ],
                    "AGUDA": [
                    {"key": "aguda@lapo-nigeria.org", "value": "aguda@lapo-nigeria.org"}
                    ],
                    "AJAH": [
                    {"key": "ajah@lapo-nigeria.org", "value": "ajah@lapo-nigeria.org"}
                    ],
                    "AJEGUNLE": [
                    {"key": "ajegunle@lapo-nigeria.org", "value": "ajegunle@lapo-nigeria.org"}
                    ],
                    "ALAPERE": [
                    {"key": "alapere@lapo-nigeria.org", "value": "alapere@lapo-nigeria.org"}
                    ],
                    "AMUKOKO": [
                    {"key": "amukoko@lapo-nigeria.org", "value": "amukoko@lapo-nigeria.org"}
                    ],
                    "AMUWO": [
                    {"key": "amuwo@lapo-nigeria.org", "value": "amuwo@lapo-nigeria.org"}
                    ],
                    "AWOYAYA": [
                    {"key": "awoyaya@lapo-nigeria.org", "value": "awoyaya@lapo-nigeria.org"}
                    ],
                    "BARIGA": [
                    {"key": "bariga@lapo-nigeria.org", "value": "bariga@lapo-nigeria.org"}
                    ],
                    "EBUTE": [
                    {"key": "ebute@lapo-nigeria.org", "value": "ebute@lapo-nigeria.org"}
                    ],
                    "EPE": [
                    {"key": "epe@lapo-nigeria.org", "value": "epe@lapo-nigeria.org"}
                    ],
                    "FORSYTHE": [
                    {"key": "forsythe@lapo-nigeria.org", "value": "forsythe@lapo-nigeria.org"}
                    ],
                    "GBAGADA": [
                    {"key": "gbagada@lapo-nigeria.org", "value": "gbagada@lapo-nigeria.org"}
                    ],
                    "IDI-ORO": [
                    {"key": "idioro@lapo-nigeria.org", "value": "idioro@lapo-nigeria.org"}
                    ],
                    "IGBOGBO": [
                    {"key": "igbogbo@lapo-nigeria.org", "value": "igbogbo@lapo-nigeria.org"}
                    ],
                    "IJEDE": [
                    {"key": "ijede@lapo-nigeria.org", "value": "ijede@lapo-nigeria.org"}
                    ],
                    "IKATE": [
                    {"key": "ikate@lapo-nigeria.org", "value": "ikate@lapo-nigeria.org"}
                    ],
                    "IKORODU 1": [
                    {"key": "ikorodu1@lapo-nigeria.org", "value": "ikorodu1@lapo-nigeria.org"}
                    ],
                    "IKORODU 2": [
                    {"key": "ikorodu2@lapo-nigeria.org", "value": "ikorodu2@lapo-nigeria.org"}
                    ],
                    "IKOSI": [
                    {"key": "ikosi@lapo-nigeria.org", "value": "ikosi@lapo-nigeria.org"}
                    ],
                    "IMOTA": [
                    {"key": "imota@lapo-nigeria.org", "value": "imota@lapo-nigeria.org"}
                    ],
                    "ITIRE": [
                    {"key": "itire@lapo-nigeria.org", "value": "itire@lapo-nigeria.org"}
                    ],
                    "LAKOWE": [
                    {"key": "lakowe@lapo-nigeria.org", "value": "lakowe@lapo-nigeria.org"}
                    ],
                    "MAGBON": [
                    {"key": "magbon@lapo-nigeria.org", "value": "magbon@lapo-nigeria.org"}
                    ],
                    "MILE 12 - 1": [
                    {"key": "edlsmile12@lapo-nigeria.org", "value": "edlsmile12@lapo-nigeria.org"}
                    ],
                    "MILE 12 - 2": [
                    {"key": "mile12@lapo-nigeria.org", "value": "mile12@lapo-nigeria.org"}
                    ],
                    "OBANIKORO": [
                    {"key": "obanikoro@lapo-nigeria.org", "value": "obanikoro@lapo-nigeria.org"}
                    ],
                    "ODI-OLOWO": [
                    {"key": "odi.olowo@lapo-nigeria.org", "value": "odi.olowo@lapo-nigeria.org"}
                    ],
                    "ODOGUNYAN": [
                    {"key": "odogunyan@lapo-nigeria.org", "value": "odogunyan@lapo-nigeria.org"}
                    ],
                    "OJOTA": [
                    {"key": "ojota@lapo-nigeria.org", "value": "ojota@lapo-nigeria.org"}
                    ],
                    "ONIPANU": [
                    {"key": "onipanu@lapo-nigeria.org", "value": "onipanu@lapo-nigeria.org"}
                    ],
                    "OPEBI": [
                    {"key": "opebi@lapo-nigeria.org", "value": "opebi@lapo-nigeria.org"}
                    ],
                    "ORILE": [
                    {"key": "orile@lapo-nigeria.org", "value": "orile@lapo-nigeria.org"}
                    ],
                    "OYINGBO": [
                    {"key": "oyingbo@lapo-nigeria.org", "value": "oyingbo@lapo-nigeria.org"}
                    ],
                    "PAPA AJAO": [
                    {"key": "papa.ajao@lapo-nigeria.org", "value": "papa.ajao@lapo-nigeria.org"}
                    ],
                    "WILMER": [
                    {"key": "wilmer@lapo-nigeria.org", "value": "wilmer@lapo-nigeria.org"}
                    ],
                    "YABA": [
                    {"key": "yaba@lapo-nigeria.org", "value": "yaba@lapo-nigeria.org"}
                    ],
                    "LAGOS WEST ZONE": [
                    {"key": "lagos.west@lapo-nigeria.org", "value": "lagos.west@lapo-nigeria.org"}
                    ],
                    "ABEOKUTA": [
                    {"key": "abeokuta.road@lapo-nigeria.org", "value": "abeokuta.road@lapo-nigeria.org"}
                    ],
                    "AGEGE": [
                    {"key": "agege@lapo-nigeria.org", "value": "agege@lapo-nigeria.org"}
                    ],
                    "AGO-IWOYE": [
                    {"key": "ago.iwoye@lapo-nigeria.org", "value": "ago.iwoye@lapo-nigeria.org"}
                    ],
                    "AKARIGBO": [
                    {"key": "akarigbo@lapo-nigeria.org", "value": "akarigbo@lapo-nigeria.org"}
                    ],
                    "AKUTE": [
                    {"key": "akute@lapo-nigeria.org", "value": "akute@lapo-nigeria.org"}
                    ],
                    "ASERO": [
                    {"key": "asero@lapo-nigeria.org", "value": "asero@lapo-nigeria.org"}
                    ],
                    "AYETORO": [
                    {"key": "ayetoro@lapo-nigeria.org", "value": "ayetoro@lapo-nigeria.org"}
                    ],
                    "DOPEMU": [
                    {"key": "dopemu@lapo-nigeria.org", "value": "dopemu@lapo-nigeria.org"}
                    ],
                    "ELEGA": [
                    {"key": "elega@lapo-nigeria.org", "value": "elega@lapo-nigeria.org"}
                    ],
                    "IBAFO": [
                    {"key": "ibafo@lapo-nigeria.org", "value": "ibafo@lapo-nigeria.org"}
                    ],
                    "IJAYE": [
                    {"key": "ijaye@lapo-nigeria.org", "value": "ijaye@lapo-nigeria.org"}
                    ],
                    "IJEBU-IGBO": [
                    {"key": "ijebuigbo@lapo-nigeria.org", "value": "ijebuigbo@lapo-nigeria.org"}
                    ],
                    "IJEBU MUSHIN": [
                    {"key": "ijebu.mushin@lapo-nigeria.org", "value": "ijebu.mushin@lapo-nigeria.org"}
                    ],
                    "IJOKO": [
                    {"key": "ijoko@lapo-nigeria.org", "value": "ijoko@lapo-nigeria.org"}
                    ],
                    "IKEJA 1": [
                    {"key": "edls.ikeja@lapo-nigeria.org", "value": "edls.ikeja@lapo-nigeria.org"}
                    ],
                    "IKEJA 2": [
                    {"key": "ikeja@lapo-nigeria.org", "value": "ikeja@lapo-nigeria.org"}
                    ],
                    "IMOWO": [
                    {"key": "imowo@lapo-nigeria.org", "value": "imowo@lapo-nigeria.org"}
                    ],
                    "IPERU": [
                    {"key": "iperu@lapo-nigeria.org", "value": "iperu@lapo-nigeria.org"}
                    ],
                    "ISHAGA": [
                    {"key": "ishaga@lapo-nigeria.org", "value": "ishaga@lapo-nigeria.org"}
                    ],
                    "ISHARA": [
                    {"key": "ishara@lapo-nigeria.org", "value": "ishara@lapo-nigeria.org"}
                    ],
                    "ITA OSHIN": [
                    {"key": "ita.oshin@lapo-nigeria.org", "value": "ita.oshin@lapo-nigeria.org"}
                    ],
                    "ITOKUN": [
                    {"key": "itokun@lapo-nigeria.org", "value": "itokun@lapo-nigeria.org"}
                    ],
                    "KARA": [
                    {"key": "kara@lapo-nigeria.org", "value": "kara@lapo-nigeria.org"}
                    ],
                    "KUTO": [
                    {"key": "kuto@lapo-nigeria.org", "value": "kuto@lapo-nigeria.org"}
                    ],
                    "LAFEWA": [
                    {"key": "lafewa@lapo-nigeria.org", "value": "lafewa@lapo-nigeria.org"}
                    ],
                    "MAFOLUKU": [
                    {"key": "mafoluku@lapo-nigeria.org", "value": "mafoluku@lapo-nigeria.org"}
                    ],
                    "MAKUN": [
                    {"key": "makun@lapo-nigeria.org", "value": "makun@lapo-nigeria.org"}
                    ],
                    "MATOGUN": [
                    {"key": "matogun@lapo-nigeria.org", "value": "matogun@lapo-nigeria.org"}
                    ],
                    "MOWE": [
                    {"key": "mowe@lapo-nigeria.org", "value": "mowe@lapo-nigeria.org"}
                    ],
                    "OGBA": [
                    {"key": "ogba@lapo-nigeria.org", "value": "ogba@lapo-nigeria.org"}
                    ],
                    "OGIJO": [
                    {"key": "ogijo@lapo-nigeria.org", "value": "ogijo@lapo-nigeria.org"}
                    ],
                    "OJODU": [
                    {"key": "ojodu@lapo-nigeria.org", "value": "ojodu@lapo-nigeria.org"}
                    ],
                    "OKE-ARO": [
                    {"key": "oke.aro@lapo-nigeria.org", "value": "oke.aro@lapo-nigeria.org"}
                    ],
                    "OKO-OBA": [
                    {"key": "oko.oba@lapo-nigeria.org", "value": "oko.oba@lapo-nigeria.org"}
                    ],
                    "OPE ILU": [
                    {"key": "ope.ilu@lapo-nigeria.org", "value": "ope.ilu@lapo-nigeria.org"}
                    ],
                    "OSHODI": [
                    {"key": "oshodi@lapo-nigeria.org", "value": "oshodi@lapo-nigeria.org"}
                    ],
                    "OSIELE": [
                    {"key": "OSIELE@lapo-nigeria.org", "value": "OSIELE@lapo-nigeria.org"}
                    ],
                    "SABO": [
                    {"key": "sabo@lapo-nigeria.org", "value": "sabo@lapo-nigeria.org"}
                    ],
                    "SAPON": [
                    {"key": "sapon@lapo-nigeria.org", "value": "sapon@lapo-nigeria.org"}
                    ],
                    "TALA": [
                    {"key": "tala@lapo-nigeria.org", "value": "tala@lapo-nigeria.org"}
                    ],
                    "TUGA": [
                    {"key": "tuga@lapo-nigeria.org", "value": "tuga@lapo-nigeria.org"}
                    ],
                    "MIDDLE BELT": [
                    {"key": "middle.belt@lapo-nigeria.org", "value": "middle.belt@lapo-nigeria.org"}
                    ],
                    "ANKPA": [
                        {"key": "ankpa@lapo-nigeria.org", "value": "ankpa@lapo-nigeria.org"}
                    ],
                    "ANYIGBA": [
                        {"key": "anyigba@lapo-nigeria.org", "value": "anyigba@lapo-nigeria.org"}
                    ],
                    "BARDE": [
                        {"key": "barde@lapo-nigeria.org", "value": "barde@lapo-nigeria.org"}
                    ],
                    "EGBE": [
                        {"key": "egbe@lapo-nigeria.org", "value": "egbe@lapo-nigeria.org"}
                    ],
                    "GBOKO 1": [
                        {"key": "gboko1@lapo-nigeria.org", "value": "gboko1@lapo-nigeria.org"}
                    ],
                    "GBOKO 2": [
                        {"key": "gboko2@lapo-nigeria.org", "value": "gboko2@lapo-nigeria.org"}
                    ],
                    "GEMBU": [
                        {"key": "gembu@lapo-nigeria.org", "value": "gembu@lapo-nigeria.org"}
                    ],
                    "HAMMARUWA": [
                        {"key": "hammaruwa@lapo-nigeria.org", "value": "hammaruwa@lapo-nigeria.org"}
                    ],
                    "IDAH": [
                        {"key": "idah@lapo-nigeria.org", "value": "idah@lapo-nigeria.org"}
                    ],
                    "ISANLU": [
                        {"key": "isanlu@lapo-nigeria.org", "value": "isanlu@lapo-nigeria.org"}
                    ],
                    "KABBA": [
                        {"key": "kabba@lapo-nigeria.org", "value": "kabba@lapo-nigeria.org"}
                    ],
                    "KASTINA ALA": [
                        {"key": "kastina.ala@lapo-nigeria.org", "value": "kastina.ala@lapo-nigeria.org"}
                    ],
                    "LOKOJA 1": [
                        {"key": "lokoja1@lapo-nigeria.org", "value": "lokoja1@lapo-nigeria.org"}
                    ],
                    "LOKOJA 2": [
                    {"key": "lokoja2@lapo-nigeria.org", "value": "lokoja2@lapo-nigeria.org"}
                    ],
                    "MAKURDI 1": [
                    {"key": "makurdi1@lapo-nigeria.org", "value": "makurdi1@lapo-nigeria.org"}
                    ],
                    "MAKURDI 2": [
                    {"key": "makurdi.mega@lapo-nigeria.org", "value": "makurdi.mega@lapo-nigeria.org"}
                    ],
                    "MAKURDI 3": [
                    {"key": "makurdi3@lapo-nigeria.org", "value": "makurdi3@lapo-nigeria.org"}
                    ],
                    "MUBI 1": [
                    {"key": "Mubi1@lapo-nigeria.org", "value": "Mubi1@lapo-nigeria.org"}
                    ],
                    "MUBI 2": [
                    {"key": "Mubi2@lapo-nigeria.org", "value": "Mubi2@lapo-nigeria.org"}
                    ],
                    "NUMAN": [
                    {"key": "numan@lapo-nigeria.org", "value": "numan@lapo-nigeria.org"}
                    ],
                    "OBAJANA": [
                    {"key": "obajana@lapo-nigeria.org", "value": "obajana@lapo-nigeria.org"}
                    ],
                    "OJU": [
                    {"key": "oju@lapo-nigeria.org", "value": "oju@lapo-nigeria.org"}
                    ],
                    "OKENE": [
                    {"key": "okene@lapo-nigeria.org", "value": "okene@lapo-nigeria.org"}
                    ],
                    "OKENE 2": [
                    {"key": "okene2@lapo-nigeria.org", "value": "okene2@lapo-nigeria.org"}
                    ],
                    "OKENE 3": [
                    {"key": "okene3@lapo-nigeria.org", "value": "okene3@lapo-nigeria.org"}
                    ],
                    "OTUKPO": [
                    {"key": "otukpo@lapo-nigeria.org", "value": "otukpo@lapo-nigeria.org"}
                    ],
                    "OTUKPO 2": [
                    {"key": "otukpo2@lapo-nigeria.org", "value": "otukpo2@lapo-nigeria.org"}
                    ],
                    "OTUPKA": [
                    {"key": "otukpa@lapo-nigeria.org", "value": "otukpa@lapo-nigeria.org"}
                    ],
                    "SABO JALINGO": [
                    {"key": "sabo.jalingo@lapo-nigeria.org", "value": "sabo.jalingo@lapo-nigeria.org"}
                    ],
                    "TOWNSHIP": [
                    {"key": "township@lapo-nigeria.org", "value": "township@lapo-nigeria.org"}
                    ],
                    "UGBOKPO": [
                    {"key": "ugbokpo@lapo-nigeria.org", "value": "ugbokpo@lapo-nigeria.org"}
                    ],
                    "VANDEIKYA": [
                    {"key": "vandeikya@lapo-nigeria.org", "value": "vandeikya@lapo-nigeria.org"}
                    ],
                    "WUKARI": [
                    {"key": "wukari@lapo-nigeria.org", "value": "wukari@lapo-nigeria.org"}
                    ],
                    "YOLA 1": [
                    {"key": "yola1@lapo-nigeria.org", "value": "yola1@lapo-nigeria.org"}
                    ],
                    "YOLA 2": [
                    {"key": "yola2@lapo-nigeria.org", "value": "yola2@lapo-nigeria.org"}
                    ],
                    "YOLA 3": [
                    {"key": "yola3@lapo-nigeria.org", "value": "yola3@lapo-nigeria.org"}
                    ],
                    "ZAKIBIAM": [
                    {"key": "zakibiam@lapo-nigeria.org", "value": "zakibiam@lapo-nigeria.org"}
                    ],
                    "NORTH EAST ZONE": [
                    {"key": "n.east@lapo-nigeria.org", "value": "n.east@lapo-nigeria.org"}
                    ],
                    "AZARE": [
                    {"key": "azare@lapo-nigeria.org", "value": "azare@lapo-nigeria.org"}
                    ],
                    "BANK ROAD": [
                    {"key": "bankroad@lapo-nigeria.org", "value": "bankroad@lapo-nigeria.org"}
                    ],
                    "BOMPAI": [
                    {"key": "bompai@lapo-nigeria.org", "value": "bompai@lapo-nigeria.org"}
                    ],
                    "BUBA YARO": [
                    {"key": "bubayaro@lapo-nigeria.org", "value": "bubayaro@lapo-nigeria.org"}
                    ],
                    "BUKURU": [
                    {"key": "bukuru@lapo-nigeria.org", "value": "bukuru@lapo-nigeria.org"}
                    ],
                    "DALA": [
                    {"key": "dala@lapo-nigeria.org", "value": "dala@lapo-nigeria.org"}
                    ],
                    "DAMBATTA": [
                    {"key": "dambatta@lapo-nigeria.org", "value": "dambatta@lapo-nigeria.org"}
                    ],
                    "DAWANU": [
                    {"key": "dawanu@lapo-nigeria.org", "value": "dawanu@lapo-nigeria.org"}
                    ],
                    "DUKKU": [
                    {"key": "dukku@lapo-nigeria.org", "value": "dukku@lapo-nigeria.org"}
                    ],
                    "DUTSE": [
                    {"key": "dutse@lapo-nigeria.org", "value": "dutse@lapo-nigeria.org"}
                    ],
                    "FARINGADA": [
                    {"key": "faringada@lapo-nigeria.org", "value": "faringada@lapo-nigeria.org"}
                    ],
                    "GUMEL": [
                    {"key": "gumel@lapo-nigeria.org", "value": "gumel@lapo-nigeria.org"}
                    ],
                    "HADEJA": [
                    {"key": "hadeja@lapo-nigeria.org", "value": "hadeja@lapo-nigeria.org"}
                    ],
                    "HOTORO": [
                    {"key": "hotoro@lapo-nigeria.org", "value": "hotoro@lapo-nigeria.org"}
                    ],
                    "LAMINGO": [
                    {"key": "lamingo@lapo-nigeria.org", "value": "lamingo@lapo-nigeria.org"}
                    ],
                    "MANGU": [
                    {"key": "mangu@lapo-nigeria.org", "value": "mangu@lapo-nigeria.org"}
                    ],
                    "MURTALA MUHAMMED": [
                    {"key": "murtala.muhammed@lapo-nigeria.org", "value": "murtala.muhammed@lapo-nigeria.org"}
                    ],
                    "NAIBAWA": [
                    {"key": "naibawa@lapo-nigeria.org", "value": "naibawa@lapo-nigeria.org"}
                    ],
                    "PANSHEKARA": [
                    {"key": "panshekara@lapo-nigeria.org", "value": "panshekara@lapo-nigeria.org"}
                    ],
                    "RANO": [
                    {"key": "rano@lapo-nigeria.org", "value": "rano@lapo-nigeria.org"}
                    ],
                    "SABO GARI": [
                    {"key": "sabo.gari@lapo-nigeria.org", "value": "sabo.gari@lapo-nigeria.org"}
                    ],
                    "SHENDAM": [
                    {"key": "shendam@lapo-nigeria.org", "value": "shendam@lapo-nigeria.org"}
                    ],
                    "TARMINUS": [
                    {"key": "tarminus@lapo-nigeria.org", "value": "tarminus@lapo-nigeria.org"}
                    ],
                    "WUDIL": [
                    {"key": "wudil@lapo-nigeria.org", "value": "wudil@lapo-nigeria.org"}
                    ],
                    "WUNTI": [
                    {"key": "wunti@lapo-nigeria.org", "value": "wunti@lapo-nigeria.org"}
                    ],
                    "YELWA": [
                    {"key": "yelwa@lapo-nigeria.org", "value": "yelwa@lapo-nigeria.org"}
                    ],
                    "NORTH WEST ZONE": [
                    {"key": "n.west@lapo-nigeria.org", "value": "n.west@lapo-nigeria.org"}
                    ],
                    "ANGWAN ROGO": [
                    {"key": "angwanrogo@lapo-nigeria.org", "value": "angwanrogo@lapo-nigeria.org"}
                    ],
                    "ARGUNGU": [
                    {"key": "argungu@lapo-nigeria.org", "value": "argungu@lapo-nigeria.org"}
                    ],
                    "BAGUDO": [
                    {"key": "bagudo@lapo-nigeria.org", "value": "bagudo@lapo-nigeria.org"}
                    ],
                    "BODINGA": [
                    {"key": "bodinga@lapo-nigeria.org", "value": "bodinga@lapo-nigeria.org"}
                    ],
                    "DANDIMA": [
                    {"key": "dandima@lapo-nigeria.org", "value": "dandima@lapo-nigeria.org"}
                    ],
                    "FUNTUA": [
                    {"key": "funtua@lapo-nigeria.org", "value": "funtua@lapo-nigeria.org"}
                    ],
                    "GUSAU 1": [
                    {"key": "gusau1@lapo-nigeria.org", "value": "gusau1@lapo-nigeria.org"}
                    ],
                    "GUSAU 2": [
                    {"key": "gusau2@lapo-nigeria.org", "value": "gusau2@lapo-nigeria.org"}
                    ],
                    "ILELLA": [
                    {"key": "ilella@lapo-nigeria.org", "value": "ilella@lapo-nigeria.org"}
                    ],
                    "ISA": [
                    {"key": "isa@lapo-nigeria.org", "value": "isa@lapo-nigeria.org"}
                    ],
                    "JEGA": [
                    {"key": "jega@lapo-nigeria.org", "value": "jega@lapo-nigeria.org"}
                    ],
                    "KATSINA 1": [
                    {"key": "katsina1@lapo-nigeria.org", "value": "katsina1@lapo-nigeria.org"}
                    ],
                    "KATSINA 2": [
                    {"key": "katsina2@lapo-nigeria.org", "value": "katsina2@lapo-nigeria.org"}
                    ],
                    "KAURA NAMODA": [
                    {"key": "kaura.namoda@lapo-nigeria.org", "value": "kaura.namoda@lapo-nigeria.org"}
                    ],
                    "KEBBI 1": [
                    {"key": "kebbi@lapo-nigeria.org", "value": "kebbi@lapo-nigeria.org"}
                    ],
                    "KEBBI 2": [
                    {"key": "kebbi2@lapo-nigeria.org", "value": "kebbi2@lapo-nigeria.org"}
                    ],
                    "MAIYAMA": [
                    {"key": "maiyama@lapo-nigeria.org", "value": "maiyama@lapo-nigeria.org"}
                    ],
                    "MALUMFASHI": [
                    {"key": "malumfashi@lapo-nigeria.org", "value": "malumfashi@lapo-nigeria.org"}
                    ],
                    "SABON BIRNI": [
                        {"key": "sabon.birni@lapo-nigeria.org", "value": "sabon.birni@lapo-nigeria.org"}
                    ],
                    "SOKOTO": [
                        {"key": "sokoto@lapo-nigeria.org", "value": "sokoto@lapo-nigeria.org"}
                    ],
                    "TALATA MAFARA": [
                        {"key": "talata.mafara@lapo-nigeria.org", "value": "talata.mafara@lapo-nigeria.org"}
                    ],
                    "TAMBUWAI": [
                        {"key": "tambuwal@lapo-nigeria.org", "value": "tambuwal@lapo-nigeria.org"}
                    ],
                    "YAURI": [
                        {"key": "yauri@lapo-nigeria.org", "value": "yauri@lapo-nigeria.org"}
                    ],
                    "ZURU": [
                        {"key": "zuru@lapo-nigeria.org", "value": "zuru@lapo-nigeria.org"}
                    ],
                    "ONDO ZONE": [
                        {"key": "ondozone@lapo-nigeria.org", "value": "ondozone@lapo-nigeria.org"}
                    ],
                    "ADEBAYO": [
                        {"key": "adebayo@lapo-nigeria.org", "value": "adebayo@lapo-nigeria.org"}
                    ],
                    "ADO EKITI 2": [
                        {"key": "ado.ekiti2@lapo-nigeria.org", "value": "ado.ekiti2@lapo-nigeria.org"}
                    ],
                    "ADO EKITI": [
                        {"key": "ado.mega@lapo-nigeria.org", "value": "ado.mega@lapo-nigeria.org"}
                    ],
                    "AGBADO": [
                        {"key": "agbado@lapo-nigeria.org", "value": "agbado@lapo-nigeria.org"}
                    ],
                    "AJILOSUN": [
                        {"key": "ajilosun@lapo-nigeria.org", "value": "ajilosun@lapo-nigeria.org"}
                    ],
                    "AKURE 1": [
                        {"key": "akure1@lapo-nigeria.org", "value": "akure1@lapo-nigeria.org"}
                    ],
                    "AKURE 2": [
                        {"key": "akure2@lapo-nigeria.org", "value": "akure2@lapo-nigeria.org"}
                    ],
                    "AKURE": [
                        {"key": "akure.mega@lapo-nigeria.org", "value": "akure.mega@lapo-nigeria.org"}
                    ],
                    "ARAMOKO": [
                        {"key": "aramoko@lapo-nigeria.org", "value": "aramoko@lapo-nigeria.org"}
                    ],
                    "EFON-ALAYE": [
                        {"key": "efon.alaye@lapo-nigeria.org", "value": "efon.alaye@lapo-nigeria.org"}
                    ],
                    "EMURE-EKITI": [
                        {"key": "emure@lapo-nigeria.org", "value": "emure@lapo-nigeria.org"}
                    ],
                    "IDANRE": [
                        {"key": "idanre@lapo-nigeria.org", "value": "idanre@lapo-nigeria.org"}
                    ],
                    "IDOANI": [
                        {"key": "idoani@lapo-nigeria.org", "value": "idoani@lapo-nigeria.org"}
                    ],
                    "IDO-EKITI": [
                        {"key": "ido.ekiti@lapo-nigeria.org", "value": "ido.ekiti@lapo-nigeria.org"}
                    ],
                    "IFAKI": [
                        {"key": "ifaki@lapo-nigeria.org", "value": "ifaki@lapo-nigeria.org"}
                    ],
                    "IFON": [
                        {"key": "ifon@lapo-nigeria.org", "value": "ifon@lapo-nigeria.org"}
                    ],
                    "IGBARA-ODO": [
                        {"key": "igbara.odo@lapo-nigeria.org", "value": "igbara.odo@lapo-nigeria.org"}
                    ],
                    "IGELE MAROKO": [
                        {"key": "igele.maroko@lapo-nigeria.org", "value": "igele.maroko@lapo-nigeria.org"}
                    ],
                    "IKARE": [
                        {"key": "ikare@lapo-nigeria.org", "value": "ikare@lapo-nigeria.org"}
                    ],
                    "IKARE 2": [
                        {"key": "ikare2@lapo-nigeria.org", "value": "ikare2@lapo-nigeria.org"}
                    ],
                    "IKERE-EKITI": [
                        {"key": "ikere.ekiti@lapo-nigeria.org", "value": "ikere.ekiti@lapo-nigeria.org"}
                    ],
                    "IKOLE EKITI": [
                        {"key": "ikole.ekiti@lapo-nigeria.org", "value": "ikole.ekiti@lapo-nigeria.org"}
                    ],
                    "ILARA-MOKIN": [
                        {"key": "ilara.mokin@lapo-nigeria.org", "value": "ilara.mokin@lapo-nigeria.org"}
                    ],
                    "ILE-OLUJI": [
                        {"key": "ile.oluji@lapo-nigeria.org", "value": "ile.oluji@lapo-nigeria.org"}
                    ],
                    "IRELE": [
                        {"key": "irele@lapo-nigeria.org", "value": "irele@lapo-nigeria.org"}
                    ],
                    "ISINKAN": [
                        {"key": "isinkan@lapo-nigeria.org", "value": "isinkan@lapo-nigeria.org"}
                    ],
                    "ITA-OGBOLU": [
                        {"key": "itaogbolu@lapo-nigeria.org", "value": "itaogbolu@lapo-nigeria.org"}
                    ],
                    "IYE-EKITI": [
                        {"key": "iye.ekiti@lapo-nigeria.org", "value": "iye.ekiti@lapo-nigeria.org"}
                    ],
                    "LEO": [
                        {"key": "leo@lapo-nigeria.org", "value": "leo@lapo-nigeria.org"}
                    ],
                    "OKA-AKOKO": [
                        {"key": "oka.akoko@lapo-nigeria.org", "value": "oka.akoko@lapo-nigeria.org"}
                    ],
                    "OKE IJEBU": [
                        {"key": "oke.ijebu@lapo-nigeria.org", "value": "oke.ijebu@lapo-nigeria.org"}
                    ],
                    "OKE-ILA": [
                        {"key": "oke.ila@lapo-nigeria.org", "value": "oke.ila@lapo-nigeria.org"}
                    ],
                    "OKITIPUPA": [
                        {"key": "okitipupa@lapo-nigeria.org", "value": "okitipupa@lapo-nigeria.org"}
                    ],
                    "OMUO EKITI": [
                        {"key": "omuo.ekiti@lapo-nigeria.org", "value": "omuo.ekiti@lapo-nigeria.org"}
                    ],
                    "ONDO 1": [
                        {"key": "ondo1@lapo-nigeria.org", "value": "ondo1@lapo-nigeria.org"}
                    ],
                    "ONDO 2": [
                        {"key": "ondo2@lapo-nigeria.org", "value": "ondo2@lapo-nigeria.org"}
                    ],
                    "ORE": [
                        {"key": "ore@lapo-nigeria.org", "value": "ore@lapo-nigeria.org"}
                    ],
                    "ORE 2": [
                        {"key": "ore2@lapo-nigeria.org", "value": "ore2@lapo-nigeria.org"}
                    ],
                    "OSHINLE": [
                        {"key": "oshinle@lapo-nigeria.org", "value": "oshinle@lapo-nigeria.org"}
                    ],
                    "OTUN": [
                        {"key": "otun@lapo-nigeria.org", "value": "otun@lapo-nigeria.org"}
                    ],
                    "OWO 1": [
                        {"key": "owo1@lapo-nigeria.org", "value": "owo1@lapo-nigeria.org"}
                    ],
                    "OWO 2": [
                        {"key": "owo2@lapo-nigeria.org", "value": "owo2@lapo-nigeria.org"}
                    ],
                    "OYEMEKUN": [
                        {"key": "oyemekun@lapo-nigeria.org", "value": "oyemekun@lapo-nigeria.org"}
                    ],
                    "OYO ZONE": [
                        {"key": "oyo.zone@lapo-nigeria.org", "value": "oyo.zone@lapo-nigeria.org"}
                    ],
                    "ABAPANU": [
                        {"key": "abapanu@lapo-nigeria.org", "value": "abapanu@lapo-nigeria.org"}
                    ],
                    "AKOBO": [
                        {"key": "akobo@lapo-nigeria.org", "value": "akobo@lapo-nigeria.org"}
                    ],
                    "ALAKIA": [
                        {"key": "alakia@lapo-nigeria.org", "value": "alakia@lapo-nigeria.org"}
                    ],
                    "APATA": [
                        {"key": "apata@lapo-nigeria.org", "value": "apata@lapo-nigeria.org"}
                    ],
                    "BEERE": [
                        {"key": "beere@lapo-nigeria.org", "value": "beere@lapo-nigeria.org"}
                    ],
                    "BODIJA 1": [
                        {"key": "edls.bodija@lapo-nigeria.org", "value": "edls.bodija@lapo-nigeria.org"}
                    ],
                    "BODIJA 2": [
                        {"key": "bodija@lapo-nigeria.org", "value": "bodija@lapo-nigeria.org"}
                    ],
                    "CHALLENGE": [
                        {"key": "challenge@lapo-nigeria.org", "value": "challenge@lapo-nigeria.org"}
                    ],
                    "DUGBE": [
                        {"key": "dugbe@lapo-nigeria.org", "value": "dugbe@lapo-nigeria.org"}
                    ],
                    "ELEYELE": [
                        {"key": "eleyele@lapo-nigeria.org", "value": "eleyele@lapo-nigeria.org"}
                    ],
                    "ERUWA": [
                        {"key": "eruwa@lapo-nigeria.org", "value": "eruwa@lapo-nigeria.org"}
                    ],
                    "IGBETI": [
                        {"key": "igbeti@lapo-nigeria.org", "value": "igbeti@lapo-nigeria.org"}
                    ],
                    "IGBOHO": [
                        {"key": "igboho@lapo-nigeria.org", "value": "igboho@lapo-nigeria.org"}
                    ],
                    "IGBOORA": [
                        {"key": "igboora@lapo-nigeria.org", "value": "igboora@lapo-nigeria.org"}
                    ],
                    "ILORA": [
                        {"key": "ilora@lapo-nigeria.org", "value": "ilora@lapo-nigeria.org"}
                    ],
                    "ISALE-OLA": [
                        {"key": "isale.ola@lapo-nigeria.org", "value": "isale.ola@lapo-nigeria.org"}
                    ],
                    "ISEYIN": [
                        {"key": "iseyin@lapo-nigeria.org", "value": "iseyin@lapo-nigeria.org"}
                    ],
                    "ISEYIN2": [
                        {"key": "iseyin2@lapo-nigeria.org", "value": "iseyin2@lapo-nigeria.org"}
                    ],
                    "IWO ROAD 1": [
                        {"key": "edls.iwo.rd@lapo-nigeria.org", "value": "edls.iwo.rd@lapo-nigeria.org"}
                    ],
                    "IWO ROAD 2": [
                        {"key": "iwo.road@lapo-nigeria.org", "value": "iwo.road@lapo-nigeria.org"}
                    ],
                    "IYANACHURCH": [
                        {"key": "iyana.church@lapo-nigeria.org", "value": "iyana.church@lapo-nigeria.org"}
                    ],
                    "KISI": [
                        {"key": "kisi@lapo-nigeria.org", "value": "kisi@lapo-nigeria.org"}
                    ],
                    "LADOKE": [
                        {"key": "ladoke@lapo-nigeria.org", "value": "ladoke@lapo-nigeria.org"}
                    ],
                    "MOKOLA": [
                        {"key": "mokola@lapo-nigeria.org", "value": "mokola@lapo-nigeria.org"}
                    ],
                    "MONIYA": [
                        {"key": "moniya@lapo-nigeria.org", "value": "moniya@lapo-nigeria.org"}
                    ],
                    "ODINJO": [
                        {"key": "odinjo@lapo-nigeria.org", "value": "odinjo@lapo-nigeria.org"}
                    ],
                    "OGBOMOSO 1": [
                        {"key": "ogbomoso1@lapo-nigeria.org", "value": "ogbomoso1@lapo-nigeria.org"}
                    ],
                    "OGBOMOSO 2": [
                        {"key": "ogbomoso2@lapo-nigeria.org", "value": "ogbomoso2@lapo-nigeria.org"}
                    ],
                    "OJA OBA": [
                        {"key": "oja.oba@lapo-nigeria.org", "value": "oja.oba@lapo-nigeria.org"}
                    ],
                    "OJOO": [
                        {"key": "ojoo@lapo-nigeria.org", "value": "ojoo@lapo-nigeria.org"}
                    ],
                    "OKE-ADO 1": [
                        {"key": "edls.okeado@lapo-nigeria.org", "value": "edls.okeado@lapo-nigeria.org"}
                    ],
                    "OKE-ADO 2": [
                        {"key": "oke.ado@lapo-nigeria.org", "value": "oke.ado@lapo-nigeria.org"}
                    ],
                    "OKEHO": [
                        {"key": "okeho@lapo-nigeria.org", "value": "okeho@lapo-nigeria.org"}
                    ],
                    "OKI": [
                        {"key": "oki@lapo-nigeria.org", "value": "oki@lapo-nigeria.org"}
                    ],
                    "OKO SURU": [
                        {"key": "oko.suru@lapo-nigeria.org", "value": "oko.suru@lapo-nigeria.org"}
                    ],
                    "OLD IFE": [
                        {"key": "old.ife@lapo-nigeria.org", "value": "old.ife@lapo-nigeria.org"}
                    ],
                    "OLOPE": [
                        {"key": "olope@lapo-nigeria.org", "value": "olope@lapo-nigeria.org"}
                    ],
                    "OLORUNSHOGO": [
                        {"key": "olorunshogo@lapo-nigeria.org", "value": "olorunshogo@lapo-nigeria.org"}
                    ],
                    "OLORUNSOGO 2": [
                        {"key": "olorunshogo2@lapo-nigeria.org", "value": "olorunshogo2@lapo-nigeria.org"}
                    ],
                    "ORITA": [
                        {"key": "orita@lapo-nigeria.org", "value": "orita@lapo-nigeria.org"}
                    ],
                    "OYO 1": [
                        {"key": "oyo1@lapo-nigeria.org", "value": "oyo1@lapo-nigeria.org"}
                    ],
                    "OYO 2": [
                        {"key": "oyo2@lapo-nigeria.org", "value": "oyo2@lapo-nigeria.org"}
                    ],
                    "SAKI": [
                        {"key": "saki@lapo-nigeria.org", "value": "saki@lapo-nigeria.org"}
                    ],
                    "SOUTH EAST ZONE": [
                        {"key": "south.east@lapo-nigeria.org", "value": "south.east@lapo-nigeria.org"}
                    ],
                    "ABA": [
                        {"key": "aba@lapo-nigeria.org", "value": "aba@lapo-nigeria.org"}
                    ],
                    "ABRIBA": [
                        {"key": "abiriba@lapo-nigeria.org", "value": "abiriba@lapo-nigeria.org"}
                    ],
                    "AKOKWA": [
                        {"key": "akokwa@lapo-nigeria.org", "value": "akokwa@lapo-nigeria.org"}
                    ],
                    "ALABA-NAZE": [
                        {"key": "naze@lapo-nigeria.org", "value": "naze@lapo-nigeria.org"}
                    ],
                    "AMAKOHIA": [
                        {"key": "amakohia@lapo-nigeria.org", "value": "amakohia@lapo-nigeria.org"}
                    ],
                    "ARIARIA": [
                        {"key": "ariaria@lapo-nigeria.org", "value": "ariaria@lapo-nigeria.org"}
                    ],
                    "AROCHUKWU": [
                        {"key": "arochukwu@lapo-nigeria.org", "value": "arochukwu@lapo-nigeria.org"}
                    ],
                    "ASA": [
                        {"key": "asa@lapo-nigeria.org", "value": "asa@lapo-nigeria.org"}
                    ],
                    "DOUGLAS": [
                        {"key": "douglas@lapo-nigeria.org", "value": "douglas@lapo-nigeria.org"}
                    ],
                    "FAULKS": [
                        {"key": "faulks@lapo-nigeria.org", "value": "faulks@lapo-nigeria.org"}
                    ],
                    "IDEATO SOUTH": [
                        {"key": "ideato.south@lapo-nigeria.org", "value": "ideato.south@lapo-nigeria.org"}
                    ],
                    "ISIKWATO": [
                        {"key": "isikwato@lapo-nigeria.org", "value": "isikwato@lapo-nigeria.org"}
                    ],
                    "ISUOCHI": [
                        {"key": "isuochi@lapo-nigeria.org", "value": "isuochi@lapo-nigeria.org"}
                    ],
                    "MBAISE": [
                        {"key": "mbaise@lapo-nigeria.org", "value": "mbaise@lapo-nigeria.org"}
                    ],
                    "OBINZE": [
                        {"key": "obinze@lapo-nigeria.org", "value": "obinze@lapo-nigeria.org"}
                    ],
                    "OHAFIA": [
                        {"key": "ohafia@lapo-nigeria.org", "value": "ohafia@lapo-nigeria.org"}
                    ],
                    "OKIGWE": [
                        {"key": "okigwe@lapo-nigeria.org", "value": "okigwe@lapo-nigeria.org"}
                    ],
                    "OREAGU": [
                        {"key": "oreagu@lapo-nigeria.org", "value": "oreagu@lapo-nigeria.org"}
                    ],
                    "ORLU": [
                        {"key": "orlu@lapo-nigeria.org", "value": "orlu@lapo-nigeria.org"}
                    ],
                    "OSISIOMA": [
                        {"key": "osisioma@lapo-nigeria.org", "value": "osisioma@lapo-nigeria.org"}
                    ],
                    "UBAKALA": [
                        {"key": "ubakala@lapo-nigeria.org", "value": "ubakala@lapo-nigeria.org"}
                    ],
                    "FLYOVER": [
                        {"key": "flyover@lapo-nigeria.org", "value": "flyover@lapo-nigeria.org"}
                    ],
                    "UZUAOKOLI": [
                        {"key": "uzuaokoli@lapo-nigeria.org", "value": "uzuaokoli@lapo-nigeria.org"}
                    ],
                    "WETHERAL": [
                        {"key": "wetheral@lapo-nigeria.org", "value": "wetheral@lapo-nigeria.org"}
                    ],
                    "RIVERS ZONE": [
                        {"key": "south.south@lapo-nigeria.org", "value": "south.south@lapo-nigeria.org"}
                    ],
                    "AGGREY": [
                        {"key": "aggrey@lapo-nigeria.org", "value": "aggrey@lapo-nigeria.org"}
                    ],
                    "AHODA": [
                        {"key": "ahoada@lapo-nigeria.org", "value": "ahoada@lapo-nigeria.org"}
                    ],
                    "BOROKIRI": [
                        {"key": "borokiri@lapo-nigeria.org", "value": "borokiri@lapo-nigeria.org"}
                    ],
                    "CHOBA": [
                        {"key": "choba@lapo-nigeria.org", "value": "choba@lapo-nigeria.org"}
                    ],
                    "ELELE": [
                        {"key": "elele@lapo-nigeria.org", "value": "elele@lapo-nigeria.org"}
                    ],
                    "ELELENWO": [
                        {"key": "elelenwo@lapo-nigeria.org", "value": "elelenwo@lapo-nigeria.org"}
                    ],
                    "MILE 1": [
                        {"key": "mile1@lapo-nigeria.org", "value": "mile1@lapo-nigeria.org"}
                    ],
                    "MILE 3": [
                        {"key": "mile3@lapo-nigeria.org", "value": "mile3@lapo-nigeria.org"}
                    ],
                    "NORWAN": [
                        {"key": "norwan@lapo-nigeria.org", "value": "norwan@lapo-nigeria.org"}
                    ],
                    "OBIGBO": [
                        {"key": "obigbo@lapo-nigeria.org", "value": "obigbo@lapo-nigeria.org"}
                    ],
                    "OKPORO": [
                        {"key": "okporo@lapo-nigeria.org", "value": "okporo@lapo-nigeria.org"}
                    ],
                    "RUMUOKORO": [
                        {"key": "rumuokoro@lapo-nigeria.org", "value": "rumuokoro@lapo-nigeria.org"}
                    ],
                    "RUMUOKWUTA": [
                        {"key": "rumuokwuta@lapo-nigeria.org", "value": "rumuokwuta@lapo-nigeria.org"}
                    ],
                    "STADIUM ROAD": [
                        {"key": "stadium.road@lapo-nigeria.org", "value": "stadium.road@lapo-nigeria.org"}
                    ],
                    "UMUEBELE": [
                        {"key": "umuebele@lapo-nigeria.org", "value": "umuebele@lapo-nigeria.org"}
                    ],
                    "WOJI": [
                        {"key": "woji@lapo-nigeria.org", "value": "woji@lapo-nigeria.org"}
                    ],
                    "SOUTH WEST ZONE": [
                        {"key": "south.west@lapo-nigeria.org", "value": "south.west@lapo-nigeria.org"}
                    ],
                    "APOMU": [
                        {"key": "apomu@lapo-nigeria.org", "value": "apomu@lapo-nigeria.org"}
                    ],
                    "ARAROMI": [
                        {"key": "araromi@lapo-nigeria.org", "value": "araromi@lapo-nigeria.org"}
                    ],
                    "EDE": [
                        {"key": "ede@lapo-nigeria.org", "value": "ede@lapo-nigeria.org"}
                    ],
                    "ERIN-ILE": [
                        {"key": "erin.ile@lapo-nigeria.org", "value": "erin.ile@lapo-nigeria.org"}
                    ],
                    "ERIN OSUN": [
                        {"key": "erin.osun@lapo-nigeria.org", "value": "erin.osun@lapo-nigeria.org"}
                    ],
                    "ESA-OKE": [
                        {"key": "esa.oke@lapo-nigeria.org", "value": "esa.oke@lapo-nigeria.org"}
                    ],
                    "ESTATE": [
                        {"key": "estate@lapo-nigeria.org", "value": "estate@lapo-nigeria.org"}
                    ],
                    "GBONGAN": [
                        {"key": "gbongan@lapo-nigeria.org", "value": "gbongan@lapo-nigeria.org"}
                    ],
                    "IBOKUN": [
                        {"key": "ibokun@lapo-nigeria.org", "value": "ibokun@lapo-nigeria.org"}
                    ],
                    "IFE1": [
                        {"key": "ife1@lapo-nigeria.org", "value": "ife1@lapo-nigeria.org"}
                    ],
                    "IFE2": [
                        {"key": "ife2@lapo-nigeria.org", "value": "ife2@lapo-nigeria.org"}
                    ],
                    "IFETEDO": [
                        {"key": "ifetedo@lapo-nigeria.org", "value": "ifetedo@lapo-nigeria.org"}
                    ],
                    "IFEWARA": [
                        {"key": "ifewara@lapo-nigeria.org", "value": "ifewara@lapo-nigeria.org"}
                    ],
                    "IGBONO": [
                        {"key": "igbono@lapo-nigeria.org", "value": "igbono@lapo-nigeria.org"}
                    ],
                    "IKIRE": [
                        {"key": "ikire@lapo-nigeria.org", "value": "ikire@lapo-nigeria.org"}
                    ],
                    "IKIRUN": [
                        {"key": "ikirun@lapo-nigeria.org", "value": "ikirun@lapo-nigeria.org"}
                    ],
                    "ILA ORANGUN": [
                        {"key": "ila.oragun@lapo-nigeria.org", "value": "ila.oragun@lapo-nigeria.org"}
                    ],
                    "ILESA 1": [
                        {"key": "ilesa1@lapo-nigeria.org", "value": "ilesa1@lapo-nigeria.org"}
                    ],
                    "ILESA 2": [
                        {"key": "ilesa2@lapo-nigeria.org", "value": "ilesa2@lapo-nigeria.org"}
                    ],
                    "ILLORIN 1": [
                        {"key": "ilorin1@lapo-nigeria.org", "value": "ilorin1@lapo-nigeria.org"}
                    ],
                    "ILLORIN 2": [
                        {"key": "ilorin2@lapo-nigeria.org", "value": "ilorin2@lapo-nigeria.org"}
                    ],
                    "ILLORIN 3": [
                        {"key": "ilorin3@lapo-nigeria.org", "value": "ilorin3@lapo-nigeria.org"}
                    ],
                    "ILLORIN 4": [
                        {"key": "ilorin4@lapo-nigeria.org", "value": "ilorin4@lapo-nigeria.org"}
                    ],
                    "INISA": [
                        {"key": "inisa@lapo-nigeria.org", "value": "inisa@lapo-nigeria.org"}
                    ],
                    "IPETU-IJESHA": [
                        {"key": "ipetu.ijesha@lapo-nigeria.org", "value": "ipetu.ijesha@lapo-nigeria.org"}
                    ],
                    "IPETUMODU": [
                        {"key": "ipetumodu@lapo-nigeria.org", "value": "ipetumodu@lapo-nigeria.org"}
                    ],
                    "ISALE-OSUN": [
                        {"key": "isale.osun@lapo-nigeria.org", "value": "isale.osun@lapo-nigeria.org"}
                    ],
                    "JEBBA": [
                        {"key": "jebba@lapo-nigeria.org", "value": "jebba@lapo-nigeria.org"}
                    ],
                    "KAYAMA": [
                        {"key": "kayama@lapo-nigeria.org", "value": "kayama@lapo-nigeria.org"}
                    ],
                    "KOSUBOSU": [
                        {"key": "kosubosu@lapo-nigeria.org", "value": "kosubosu@lapo-nigeria.org"}
                    ],
                    "LAFIAGI": [
                        {"key": "lafiagi@lapo-nigeria.org", "value": "lafiagi@lapo-nigeria.org"}
                    ],
                    "MODAKEKE": [
                        {"key": "modakeke@lapo-nigeria.org", "value": "modakeke@lapo-nigeria.org"}
                    ],
                    "OBATEDO": [
                        {"key": "obatedo@lapo-nigeria.org", "value": "obatedo@lapo-nigeria.org"}
                    ],
                    "OBELAWO": [
                        {"key": "obelawo@lapo-nigeria.org", "value": "obelawo@lapo-nigeria.org"}
                    ],
                    "OFFA": [
                        {"key": "offa@lapo-nigeria.org", "value": "offa@lapo-nigeria.org"}
                    ],
                    "OGO OLUWA": [
                        {"key": "ogo.oluwa@lapo-nigeria.org", "value": "ogo.oluwa@lapo-nigeria.org"}
                    ],
                    "OJA": [
                        {"key": "oja@lapo-nigeria.org", "value": "oja@lapo-nigeria.org"}
                    ],
                    "OJATUTU": [
                        {"key": "ojatutu@lapo-nigeria.org", "value": "ojatutu@lapo-nigeria.org"}
                    ],
                    "OKE-EJIGBO": [
                        {"key": "oke.ejigbo@lapo-nigeria.org", "value": "oke.ejigbo@lapo-nigeria.org"}
                    ],
                    "OMUARAN": [
                        {"key": "umua.aran@lapo-nigeria.org", "value": "umua.aran@lapo-nigeria.org"}
                    ],
                    "ORO": [
                        {"key": "oro@lapo-nigeria.org", "value": "oro@lapo-nigeria.org"}
                    ],
                    "OTA-EFUN": [
                        {"key": "ota.efun@lapo-nigeria.org", "value": "ota.efun@lapo-nigeria.org"}
                    ],
                    "OWODE-EDE": [
                        {"key": "owode.ede@lapo-nigeria.org", "value": "owode.ede@lapo-nigeria.org"}
                    ],
                    "PATIGI": [
                        {"key": "patigi@lapo-nigeria.org", "value": "patigi@lapo-nigeria.org"}
                    ],
                    "SHARE": [
                        {"key": "share@lapo-nigeria.org", "value": "share@lapo-nigeria.org"}
                    ]
                };    

                zoneField.addEventListener("change", function() {
                    const selectedZone = zoneField.value;
                    if (selectedZone) {
                        stateField.innerHTML = "";
                        branchField.innerHTML = "";
                        zoneOptions[selectedZone].forEach(state => {
                            const opt = document.createElement("option");
                            opt.value = state.value;
                            opt.textContent = state.value;
                            stateField.appendChild(opt);
                        });
                    }
                });

                stateField.addEventListener("change", function() {
                    const selectedState = stateField.value;

                    if (selectedState) {
                        branchField.innerHTML = "";
                        branchOptions[selectedState].forEach(option => {
                            const opt = document.createElement("option");
                            opt.value = option.key;
                            opt.textContent = option.value;
                            branchField.appendChild(opt);
                        });
                    }
                });

                branchField.addEventListener("change", function() {
                    const selectedBranch = branchField.value;

                    if (selectedBranch) {
                        branchEmails.innerHTML = "";
                        branchesEmailsOptions[selectedBranch].forEach(option => {
                            const opt = document.createElement("option");
                            opt.value = option.key;
                            opt.textContent = option.value;
                            branchEmails.appendChild(opt);
                        });
                    }
                });


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
                
                if (savedBranchEmails) {
                    setTimeout(() => {
                        branchField.value = savedBranchEmails;
                    }, 200);
                }
            
            });
        </script>';
    }
}

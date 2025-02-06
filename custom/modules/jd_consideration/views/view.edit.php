<?php
if (!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');

class jd_considerationViewEdit extends ViewEdit
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
        $this->ss->assign('JD_BRANCH', $savedBranch);

        // Add custom JS for dropdown dependency
        echo '<script type="text/javascript">
            $(document).ready(function() {
                // hide assignedto field
                $(`div[data-field="assigned_user_name"]`).hide();

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

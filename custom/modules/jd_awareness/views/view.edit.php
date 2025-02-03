<?php
if (!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');

class jd_awarenessViewEdit extends ViewEdit
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
                    ]
                };
                
                const branches_emails = {
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

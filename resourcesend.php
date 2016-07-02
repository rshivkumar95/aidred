<div class="row" style="margin-bottom:0px;margin-top:80px">

   <div class="col s12" style="background:#000000;text-align:center;color:#ffffff;padding:20px;">
                 <h6>All &copy; reserved at www.aidred.com </h6>
   </div>
</div>



<script type="text/javascript" src="js/jquery-2.1.1.min.js"></script> 

      <script type="text/javascript" src="js/materialize.min.js"></script>
      <script type="text/javascript" src="js/init.js"></script>
   
<script type="text/javascript">
        window.onload = function() {
  // provs is an object but you can think of it as a lookup table
       
  var provs = {
    'select state':['select city'],
        'ANDAMAN & NICOBAR': ['select city','Andaman','Nicobar'],
        'ANDHRA PRADESH': ['select city','Adilabad','Anantpur','Chittor','Cuddapah','Guntur','Hyderabad Urban','Karim Nagar','Khammam','Krishna','Kurnool','Medak','Mehboobnagar','Nalgonda','Nellore','Nizamabad','Prakasam','Ranga Reddy','Srikakulam','Vishakapatnam','Vizianagaram','Warangal','West Godavari','east Godavari'],
'ARUNACHAL PRADESH': ['select city','Alog(West Siang)','Bomdila','Changalang','Daporijo','Diban Valley(Anini Valley)','Dibang Valley','East Kameng Seppa','East Siang(Passighat)','Itanagar','Khonsa','Lohit(Tezu)','Lower Subansiri(Ziro)','Roin','Tawang'],
'ASSAM': ['select city','Barpeta','Bongaigaon','Cachar','Darrang','Dhemaji','Dhubri','Dibrugarh','Goalpara','Golaghat','Hailakandi','Jorhat','Kamrup','Karbi-Anglong','Karimganj','Kokrajhar','Lakhimpur','Morigaon','N.C.Hills','Nagaon','Nalbari','Sibsagar','Sonitpur','Tinsukia'],
'BIHAR': ['select city','Araria','Aurangabad','Banka','Begusarai','Bhabua','Bhagalpur','Bhojpur(Arah)','Buxar','Darbhanga','East Champaran','Gaya','Gopalganj','Jamui','Jehanabad','Katihar','Khagaria','Kishanganj','Lakhisarai','Madhepura','Madhubani','Munger','Muzaffarpur','Nalanda','Nawada','Patna','Purnea','Rohta(Sasaram)','Saharsa','Samastipur','Saran( Chapra )','Sekhpura','Seohar','Sitamarhi','Siwan','Supaul','Vaishali(Hajipur)','West Champaran'],
'CHANDIGARH': ['select city','Chandigarh'],
'CHATTISGARH': ['select city','Bastar','Bilaspur','Dantewada','Dhamtari','Durg','Janjgir-Champa','Jashpur','Kanker','Kawardha','Korba','Koriya','Mahasamund','Raigarh','Rajnandgaon','Surguja','Raipur'],
'DADRA & NAGAR': ['select city','Dadra'],
'DAMAN & DIU': ['select city','Dama','Diu'],
'DELHI': ['select city','Central','New Delhi','North','North East','North West','South','South West','West'],
'GOA': ['select city','North Goa','South Goa'],
'GUJRAT': ['select city','Ahmedabad','Amrela','Anand','Banaskantha','Bharuch','Bhavnagar','Dahod','Dangs','Gandhinagar','Jamnagar','Junagadh','Kheda','Kutch','Mehsana','Narmada','Navsari','Panchmahals','Patan','Porbander','Rajkot','Sabarkantha','Surat','Surendranagar','Vadodara','Valsad'],
'HARYANA': ['select city','Ambala','Bhiwani','Faridabad','Fatehabad','Gurgaon','Hissar','Jhanjhar','Jind','Kaithal','Karnal','Kurukshetra','Mahendragarh','Panchkula','Panipat','Rewari','Rohtak','Sirsa','Sonipat','Yamunanagar'],
'HIMACHAL PRADESH': ['select city','Bilaspur','Chamba','Hamirpur','Kangra','Kinnaur','Kullu','Lahaul-Spiti','Mandi','Shimla','Sirmour','Solan','Una'],
'JAMMU & KASHMIR': ['select city','Anantnag','Badgan','Baramula','Doda','Jammu','Kargil','Kathua','Kupwara','Leh','Poonch','Pulwama','Rajauri','Srinagar','Udhampur'],
'JHARKHAND': ['select city','Bokaro','Chaibasa(West Singhbhum)','Chatra','Deoghar','Dhanbad','Dumka','Garhwa','Giridih','Godda','Gumla','Hazaribagh','Jamshedpur(EastSinghbhum)','Jamtara','Koderma','Latehar','Lohardaga','Pakur','Palamu','Ranchi','Sahebganj','Saraikela','Simdega'],
'KARNATAKA': ['select city','Bangalore Rural','Bangalore Urban','Belgaum','Bellary','Bidar','Bijapur','Chamrajnagar','Chickmagalur','Chitradurga','Dakshina Kannada','Davanagare','Dharwad','Gadak','Gulberga','Hassan','Haveri','Karwar','Kolar','Koppal','Madikeri','Mandya','Mysore','Raichur','Shimoga','Tumkur','Udupi','Yadgir'],
'KERALA': ['select city','Alapuzzha','Cannanore','Ernakulam','Idukki','Kasaragod','Kottayam','Kozhikode','Mallapuram','Palghat','Pathanamthitta','Quilon','Trichur','Trivandrum','Wayanad'],
'LAKSHDWEEP': ['select city','Lakshdweep'],
'MADHYA PRADESH': ['select city','Anooppur','Ashoknagar','Badwani','Balaghat','Betul','Bhind','Bhopal','Burhanpur','Chhattarpur','Chhindwara','Damoh','Datia','Dewas','Dhar','Dindori','Guna','Gwalior','Harda','Hoshangabad','Indore','Jabalpur','Jhabua','Katni','Khandwa','Khargone','Mandla','Mandsaur','Morena','Narsinghpur','Neemuch','Panna','Raisen','Rajgarh','Ratlam','Rewa','Sagar','Satna','Sehore','Seoni','Shahdol','Shajapur','Sheopur','Shivpuri','Sindi','Tikamgarh','Ujjain','Umaria','Vidisha'],
'MAHARASHTRA': ['select city','Ahmednagar','Akola','Amravati','Aurangabad','Bandra(Mumbai Suburban district)','Beed','Bhandara','Buldhana','Chandrapur','Dhule','Gadchiroli','Gondia','Hingoli','Jalgaon','Jalna','Kolhpur','Latur','MumbaiCity','Nagpur','Nanded','Nandurbar','Nashik','Osmanabad','Parbhani','Pune','Raigad','Ratnagiri','Sangli','Satara','Sholapur','Sindudurg','Thane','Wardha','Washim','Yavatmal'],
'MANIPUR': ['select city','Bishnupur','Chandel','Churachandpur','Imphal East','Imphal West','Senapati','Tamenglong','Thoubal','Ukhrul'],
'MEGHALAYA': ['select city','East Garo Hill','East Khasi Hill','Jaintia Hill','Ri-Bhoi District','South Garo Hills','West Garo Hill','West Khasi Hill'],
'MIZORAM': ['select city','Aizawal','Champhai','Chimtipui District','Kolasib','Lawngtlai','Luglei District','Mamit','Serchhip'],
'NAGALAND': ['select city','Dimapur','Kohima','Mokokchung','Mon','Phek','Tuensang','Wokha','Zunheboto'],
'ORISSA': ['select city','Angul','Balangir','Balasore','Bargah','Bhadrak','Boudh','Cuttak','Deogarh','Dhenkanal','Gajapati','Ganjam','Jagatsinghpur','Jajpur','Jharsuguda','Kalhandi','Kendrapara','Keonjhar','Khurda','Koraput','Malkangiri','Mayurbhanj','Navapada','Navaragpur','Nayagarh','Phulbani','Puri','Rayagada','Sambalpur','Sonepur','Sundergarh'],
'PONDICHERY': ['select city','Karikal','Mahe','Pondicherry','Yaman'],
'PUNJAB': ['select city','Amritsar','Bhatinda','Faridkot','Fatehgarh Saheb','Ferozepur','Gurdaspur','Hosiarpur','Jalandhar','Kapurthala','Ludhiana','Mansa','Moga','Muktsar','Navansahar','Patiala','Ropar','Sangrur'],
'RAJASTHAN': ['select city','Ajmer','Alwar','Banswara','Baran','Barmer','Bharatpur','Bhilwara','Bikaner','Bundi','Chittorgarh','Churu','Dausa','Dholpur','Dungarpur','Ganganagar','Hanumangarh','Jaipur','Jaisalmer','Jalor','Jhalawar','Jhunjhunu','Jodhpur','Karauli','Kota','Nagaur','Pali','Rajsamand','SawaiMadhopur','Sikar','Sirohi','Tonk','Udaipur'],
'SIKKIM': ['select city','East','North','South','West'],
'TAMIL NADU': ['select city','Chennai','Coimbotore','Cuddalorei','Dharmapuri','Dindigul','Erode','Kancheepuram','Kanniyakumari (HQ : Nagercoil)','Karur','Madurai','Nagapattinam','Namakkal','Nilgiris (HQ: Udhagamandalam)','Perambalur','Pudukkottai','Ramanathapuram','Salem','Sivaganga','Thanjavur','Theni','Thoothkudi','Tiruchiorappalli','Tirunelveli','Tiruvallur','Tiruvannamalai','Tiruvarur','Vellore','Villupuram','Virudhunagar'],
'TRIPURA': ['select city','Dhalai District','North District','South District','West District'],
'UTTAR PRADESH': ['select city','Agra','Aligarh','Allahabad','Ambedkarnagar','Azamgarh','Bagpat','Bahraich','Balia','Balrampur','Banda','Barabanki','Bareilly','Basti','Bhadoi','Bijnor','Budaun','Bulandshehar','Chandauli','Deoria','Etah','Etawah','Faizabad','Farrukhabad','Fatehpur','Firozabad','GautamBoddaNagar','Gazipur','Ghaziabad','Gonda','Gorakpur','Hamirpur','Hardoi','Jalaun','Jaunpur','Jhansi','Kanooj','KanpurDehat','Kanpu(Nagar)','Kaushambi','Lakhimpur-Khedi','Lalitpur','Lucknow','Maha Maya Nagar','Maharajganj','Mahoba','Mainpuri','Mathura','Mau','Meerut','Mirzapur','Moradabad','Muzaffar Nagar','Oraiyya','Padrauna','Pilibhit','Pratapgarh','Raebareili','Rampur','Saharanpur','Sant Kabir Nagar','Shahjahanpur','Shooji Maharaj','Shravati','Siddharth Nagar','Sitapur','Sultanpur','Sunbhadra','Unnav','Varanasi','jyotiba Phoole Nagar'],

'UTTARANCHAL': ['select city','Almora','Bageshwar','Chamoli( Gopeshwar )','Champawat','Dehradun','Garhwal(Pauri)','Haridwar','Nainital','Pitoragarh','Rudraprayag','TehriGarhwal','Udhamsingh Nagar','Uttarkashi'],

'WEST BENGAL': ['select city','Bankura','Bardhaman','Birbhum','Coochbehar','Dakshin Dinajpur','Darjeeling','Hooghly','Howrah','Jalpaiguri','Malda','Medinipur','Murshidabad','Nadia','North 24 Parganas','Purulia','Siliguri','South 24 Parganas','Uttar Dinajpur']
         
      },
      // just grab references to the two drop-downs
      prov_select = document.querySelector('#state'),
      town_select = document.querySelector('#city');

  // populate the provinces drop-down
  setOptions(prov_select, Object.keys(provs));
  // populate the town drop-down
  setOptions(town_select, provs[prov_select.value]);
  
  // attach a change event listener to the provinces drop-down
  prov_select.addEventListener('change', function() {
    // get the towns in the selected province
    setOptions(town_select, provs[prov_select.value]);
  });
    
  function setOptions(dropDown, options) {
    // clear out any existing values
    dropDown.innerHTML = '';
    // insert the new options into the drop-down
    options.forEach(function(value) {
      dropDown.innerHTML += '<option name="' + value + '">' + value + '</option>';
    });
  }  
};
    </script>

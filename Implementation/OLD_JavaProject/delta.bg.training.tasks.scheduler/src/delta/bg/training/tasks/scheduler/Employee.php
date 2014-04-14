<?php
class Employee{
	private $id;
	private $workHours;
	private $startHours;
	private $endHours;
	private $availableHours;
	private $availableShifts;
	private $workShifts;
	
	function __construct($employee_id){
		if(!is_int($id)){
			throw new Exception('id is not integer');
		}
		if(id>0) this.id=id;
		else {
			throw new Exception('id must be positive');
		}
		$workHours=0;
		$res = readEmployeeDataFromDatabase($employee_id);
		if($res != 0) {
			throw new Exception('couldn\'t read employee '.$employee_id.' from database');
		}
		setDefaultWorkShifts();
		setAvailableHoursAndAvailableShifts();
	}
	
	// TODO:
	//	    readEmployeeDataFromDatabase($employee_id); 
	//	    setDefaultWorkShifts();
	//     setAvailableHoursAndAvailableShifts();
	
	
	public function getId(){
		return $this->id;
	}
	
	public function setId($id){
		if(!is_int($id)){
			throw new Exception('id is not integer');
		}
		if (id>=1){
			$this->id = id;
		}
		else {
			throw new Exception("Invalid ID number!");
		}
	}
	
	public function getWorkHours(){
		return $this->workHours;
	}
	
	public function setWorkHours($hours){
		if(!is_int($hours)){
			throw new Exception('hours are not integer');
		}
		if ($hours>=0 && $hours<=(14*8)){
			$this->workHours = hours;
		}
		else if($hours<0){
			throw new Exception("Work Hours cannot be negative!");
		}
		else{
			throw new Exception("Work Hours cannot be more than the legal value!");
		}
	}
	
	public function getStartHours() {
		return $this->startHours;
	}
	
	public function setStartHours($startHours) {		
		if(!is_array($startHours)){
			throw new Exception('startHours are not an array');
		}
		foreach($startHours as $startHour){
			if($startHour<0 || $startHour>24){
				throw new Exception("Hours are between 0 and 24!");
			}
		}
		$this->startHours = $startHours;
	}
	
	public function getEndHours() {
		return $this->endHours;
	}
	
	public function setEndHours($endHours) {
		if(!is_array($endHours)){
			throw new Exception('endHours are not an array');
		}
		foreach($endHours as $endHour){
			if($endHour<0 || $endHour>24){
				throw new Exception("Hours are between 0 and 24!");
			}
		}
		$this->endHours = $endHours;
	}
	
	public function getAvailableHours() {
		return $this->availableHours;
	}
	
	public function setAvailableHours($availableHours) {
		if(!is_array($availableHours)){
			throw new Exception('startHours are not an array');
		}
		for($availableHours as $availableHour){
			if(!is_int($availableHour)){
				throw new Exception('startHours are not integer');
			}
			if($availableHour<0 || $availableHour>24){
				throw new Exception("Hours are between 0 and 24!");		
			}
		}
		$this->availableHours = $availableHours;
	}
	
	public function getAvailableShifts() {
		return $this->availableShifts;
	}
	
	public function setAvailableShifts($availableShifts) {
		if(!is_array($availableShifts)){
			throw new Exception('availableShifts are not an array');
		}
		
		this.availableShifts = availableShifts;
	}
	
	public function getWorkShifts() {
		return workShifts;
	}
	
	public function setWorkShifts(int[][] workShifts) {
		this.workShifts = workShifts;
	}
	
	public function setDefaultWorkShifts(){
		this.workShifts = new int[14][Scheduler.getNumShifts()];
		for(int i=0;i<14;i++)
			for(int j=0;j<Scheduler.getNumShifts();j++)
				this.workShifts[i][j] = 0;
	}
	
	public function setAvailableHoursAndAvailableShifts(){
		int [] shiftStartTmp = Scheduler.getShiftStart();
		for(int i=0;i<14;i++){
			availableHours[i] = (endHours[i] - startHours[i]);
			for(int j=0;j<Scheduler.getNumShifts();j++){
				if(startHours[i] <= shiftStartTmp[j] && endHours[i] >= (shiftStartTmp[j] + Scheduler.getHoursInShift()))
					availableShifts[i][j] = true;
				else
					availableShifts[i][j] = false;
			}
		}
	}	
}
?>



// ^^^^^^^^^ PHP


public class Employee{
	
	private int id;
	private int workHours;
	private int [] startHours;
	private int [] endHours;
	private int [] availableHours;
	private boolean [][] availableShifts;
	private int [][] workShifts;
	
	public Employee(int id, String filename){
		if(id>0) this.id=id;
		else return;
		workHours=0;
		int res = readEmployeeDataFromFile(filename+id+".in");//filename = Employee, id=4, FILE: Employee4.in
		if(res != 0) System.out.println("Error!");
		availableHours = new int[14];
		availableShifts = new boolean[14][Scheduler.getNumShifts()];
		setDefaultWorkShifts();
		setAvailableHoursAndAvailableShifts();
	}

	public int getId(){
		return this.id;
	}
	public void setId(int id){
		if (id>=1){
			this.id = id;
		}
		else {
			System.out.println("Invalid ID number!");
		}
	}
	
	public int getWorkHours(){
		return this.workHours;
	}
	public void setWorkHours(int hours){
		if (hours>=0 && hours<=(14*8)){
			this.workHours = hours;
		}
		else if(hours<0){
			System.out.println("Work Hours cannot be negative!");
		}
		else{
			System.out.println("Work Hours cannot be more than the legal value!");
		}
	}
	
	public int[] getStartHours() {
		return startHours;
	}
	public void setStartHours(int[] startHours) {
		for(int startHour : startHours){
			if(startHour<0 || startHour>24){
				System.out.println("Hours are between 0 and 24!");
				return;
			}
		}
		this.startHours = startHours;
	}
	
	public int[] getEndHours() {
		return endHours;
	}
	public void setEndHours(int[] endHours) {
		for(int endHour : endHours){
			if(endHour<0 || endHour>24){
				System.out.println("Hours are between 0 and 24!");
				return;
			}
		}
		this.endHours = endHours;
	}
	
	public int[] getAvailableHours() {
		return availableHours;
	}
	public void setAvailableHours(int[] availableHours) {
		for(int availableHour : availableHours){
			if(availableHour<0 || availableHour>24){
				System.out.println("Hours are between 0 and 24!");
				return;
			}
		}
		this.availableHours = availableHours;
	}
	
	public boolean[][] getAvailableShifts() {
		return availableShifts;
	}
	public void setAvailableShifts(boolean[][] availableShifts) {
		this.availableShifts = availableShifts;
	}
	
	public int[][] getWorkShifts() {
		return workShifts;
	}
	public void setWorkShifts(int[][] workShifts) {
		this.workShifts = workShifts;
	}
	
	public void setDefaultWorkShifts(){
		this.workShifts = new int[14][Scheduler.getNumShifts()];
		for(int i=0;i<14;i++)
			for(int j=0;j<Scheduler.getNumShifts();j++)
				this.workShifts[i][j] = 0;
	}
	
	public void setAvailableHoursAndAvailableShifts(){
		int [] shiftStartTmp = Scheduler.getShiftStart();
		for(int i=0;i<14;i++){
			availableHours[i] = (endHours[i] - startHours[i]);
			for(int j=0;j<Scheduler.getNumShifts();j++){
				if(startHours[i] <= shiftStartTmp[j] && endHours[i] >= (shiftStartTmp[j] + Scheduler.getHoursInShift()))
					availableShifts[i][j] = true;
				else
					availableShifts[i][j] = false;
			}
		}
	}
	
	public int readEmployeeDataFromFile(String filename){
		int counter = 0;
		int i=0;
		this.startHours = new int [14];
		this.endHours = new int [14];
		File file;
		Scanner reader;
		try{
			file = new File(filename);
			reader = new Scanner(file,"windows-1251");
			while (reader.hasNext())
			{
				String s = reader.nextLine();
				if (counter!=0&&counter%9!=0)
				{
					if (s.isEmpty()==false)
					{
						String[] splitted = s.split("[ ]");
						if(splitted.length == 1){//if the employee is unavailable in this day
							this.startHours[i] = 0;
							this.endHours[i++] = 0;
						}
						else{
							this.startHours[i] = Integer.parseInt(splitted[1]);
							this.endHours[i++] = Integer.parseInt(splitted[2]);
						}
					}
				}
				counter++;
			}
		}
		catch (FileNotFoundException fnf){
			System.out.println("File not found!"); return 1;
		}
		reader.close();
		return 0;
	}

	public int writeEmployeeScheduleToFile(String filename){
		PrintStream fileWriter;
		try{
			fileWriter = new PrintStream(filename,"windows-1251");
			if (this.workHours < Scheduler.getMinWorkHours()) {
				fileWriter.println("Couldn't schedule enough shifts to attend.");
				fileWriter.printf("Hours scheduled for the two weeks: %d(minimum required: %d)",this.workHours, Scheduler.getMinWorkHours());
				fileWriter.println();
			}
			else{
				fileWriter.printf("Hours scheduled for the two weeks: %d",this.workHours);
				fileWriter.println();
			}
			fileWriter.println("First Week");
			fileWriter.printf("Monday ");
			printSpec(0,fileWriter);
			fileWriter.println();
			fileWriter.printf("Tuesday ");
			printSpec(1,fileWriter);
			fileWriter.println();
			fileWriter.printf("Wednesday ");
			printSpec(2,fileWriter);
			fileWriter.println();
			fileWriter.printf("Thirsday ");
			printSpec(3,fileWriter);
			fileWriter.println();
			fileWriter.printf("Friday ");
			printSpec(4,fileWriter);
			fileWriter.println();
			fileWriter.printf("Saturday ");
			printSpec(5,fileWriter);
			fileWriter.println();
			fileWriter.printf("Sunday ");
			printSpec(6,fileWriter);
			fileWriter.println();
			fileWriter.println("Second Week");
			fileWriter.printf("Monday ");
			printSpec(7,fileWriter);
			fileWriter.println();
			fileWriter.printf("Tuesday ");
			printSpec(8,fileWriter);
			fileWriter.println();
			fileWriter.printf("Wednesday ");
			printSpec(9,fileWriter);
			fileWriter.println();
			fileWriter.printf("Thirsday ");
			printSpec(10,fileWriter);
			fileWriter.println();
			fileWriter.printf("Friday ");
			printSpec(11,fileWriter);
			fileWriter.println();
			fileWriter.printf("Saturday ");
			fileWriter.println();
			printSpec(12,fileWriter);
			fileWriter.println();
			fileWriter.printf("Sunday ");
			printSpec(13,fileWriter);
		}
		catch (FileNotFoundException fnf){
			System.out.println("File not found!"); return 1;
		}
		catch (UnsupportedEncodingException un){
			System.out.println("Unsupported Encoding!"); return 1;
		}
		fileWriter.close();
		return 0;
	}
	
	public void printSpec(int day,PrintStream fileWriter){
		for (int i = 0;i < Scheduler.getNumShifts(); i++){
			if(this.workShifts[day][i] > 0){
				fileWriter.printf("%d ",i+1);
			}
		}
	}
}

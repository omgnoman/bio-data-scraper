import xml.etree.cElementTree as ET
import sqlite3
file_name = "lung1"
table_name1 = "main_table"
table_name2 = "authors_table"
conn = sqlite3.connect(file_name+'.db')
c = conn.cursor()
c.execute("CREATE TABLE IF NOT EXISTS "+
	table_name1+"(id INTEGER PRIMARY KEY, pubmed_id TEXT, year INTEGER,"+
	"month INTEGER, date INTEGER, issn TEXT, issn_type TEXT,"+
	" journal_title TEXT, iso_abbr_journal TEXT, pub_year INTEGER, pub_month TEXT, pub_date INTEGER, title TEXT,"+
	" medline_pg_no TEXT, doi TEXT, abstract TEXT,"+
	" country_journal TEXT, keyword TEXT)")
c.execute("CREATE TABLE IF NOT EXISTS "+
   table_name2+"(id INTEGER PRIMARY KEY, pubmed_id TEXT, fore_name TEXT, "+
  "last_name TEXT, initials TEXT, affiliations TEXT)")
for z in range(0, 1):
	print("File Number ::: "+str(z)) 
	tree = ET.ElementTree(file='pubmed_result ('+str(z)+').xml')
	root = tree.getroot()
	if root.tag == 'PubmedArticleSet':
		i = 0
		for c_ in root:
			i = i+1
			ATRICLE_NO = i
			print("Article number : ", i)
			if c_.tag == 'PubmedArticle':
				pubmed_id = ""
				year = ""
				month = ""
				date = ""
				issn = ""
				issn_type = ""
				journal_title =""
				iso_abbr_journal = ""
				pub__year = ""
				pub__month = ""
				pub__date = ""
				title = ""
				medline_pg_no = ""
				doi = ""
				abstract = ""
				country_journal = ""
				keyword = ""
				Keyword = []
				exist = 1
				for c_r in c_:
					if c_r.tag == 'MedlineCitation':
						for c_a_b in c_r:#Iteration over 'MedlineCitation' children
							if c_a_b.tag == "PMID":
								if c_a_b.attrib['Version'] == '1':
									pubmed_id = c_a_b.text
									c.execute("select * from "+table_name1+" where pubmed_id = "+pubmed_id+";")
									data=c.fetchall()
									if len(data) != 0:
										exist = 0


									#print("PMID : ", c_a_b.text)
							elif c_a_b.tag == "DateRevised":
				
								for c_a_b_c in c_a_b:#Iteration over 'DateRevised' children
									
									if c_a_b_c.tag == "Year":
										year = c_a_b_c.text
										#print("YEAR : ", c_a_b_c.text)
									elif c_a_b_c.tag == "Month":
										month = c_a_b_c.text
										#print("Month : ", c_a_b_c.text)
									elif c_a_b_c.tag == "Day":
										date = c_a_b_c.text
										#print("DAY : ", c_a_b_c.text)
							elif c_a_b.tag == "Article":
								Article = c_a_b.text

								for c_a_b_c in c_a_b:#Iteration over 'Article' children
									if c_a_b_c.tag == "Journal":
										Journal = c_a_b_c.text 

										for c_a_b_c_d in c_a_b_c:
											if c_a_b_c_d.tag == "ISSN":
												issn = c_a_b_c_d.text
												#print("ISSN : ", c_a_b_c_d.text)
												issn_type = c_a_b_c_d.text
												#print("ISSN Type: ", c_a_b_c_d.attrib['IssnType'])

											elif c_a_b_c_d.tag == "JournalIssue":
												for c_a_b_c_d_e in c_a_b_c_d:
													if c_a_b_c_d_e.tag == "PubDate":
														for c_a_b_c_d_e_f in c_a_b_c_d_e:
															if c_a_b_c_d_e_f.tag == "Year":
																pub__year = c_a_b_c_d_e_f.text
															elif c_a_b_c_d_e_f.tag == "Month":
																pub__month = c_a_b_c_d_e_f.text
															elif c_a_b_c_d_e_f.tag == "Day":
																pub__date = c_a_b_c_d_e_f.text						
											elif c_a_b_c_d.tag == "Title":
												journal_title = c_a_b_c_d.text
												#print("Journal Title : ", c_a_b_c_d.text)
											elif c_a_b_c_d.tag == "ISOAbbreviation":
												iso_abbr_journal = c_a_b_c_d.text
												#print("ISOAbbreviation(Journal) : ", c_a_b_c_d.text)

									#Journal 
									elif c_a_b_c.tag == "ArticleTitle":
										title = c_a_b_c.text 
										#print("Title : c_a_b_c ", title)
									elif c_a_b_c.tag == "Pagination":
										for c_a_b_c_d in c_a_b_c:
											if c_a_b_c_d.tag == "MedlinePgn":
												medline_pg_no = c_a_b_c_d.text 
												#print("Medline PAGE# : ", c_a_b_c_d.text)
									#Pagination
									elif c_a_b_c.tag == "ELocationID":
										if(c_a_b_c.attrib['EIdType']== "doi"):
											doi = c_a_b_c.text 
											#print("ELocationID(doi) : ", c_a_b_c.text)
									
									elif c_a_b_c.tag == "Abstract":
										abstract = ""
										count = sum(1 for _ in c_a_b_c.iter("*"))
										if count == 1:
											for c_a_b_c_d in c_a_b_c:
												if c_a_b_c_d.tag == "AbstractText":
													abstract = abstract+c_a_b_c_d.text
													#print("Abstract : ", c_a_b_c_d.text)
										else:
										   
											for c_a_b_c_d in c_a_b_c:
												if c_a_b_c_d.tag == "AbstractText":
												
													abstract+= abstract+c_a_b_c_d.text
											#print("Abstract : ", abstract)
											#if c_a_b_c_d.tag == "CopyrightInformation":
												#print("CopyrightInformation : ", c_a_b_c_d.text)
									elif c_a_b_c.tag == "AuthorList":
										
										for c_a_b_c_d in c_a_b_c:
											
											if(c_a_b_c_d.tag == "Author"):
												first__name = ""
												last__ame = "" 
												initials  = ""
												affiliation = ""
												for c_a_b_c_d_e in c_a_b_c_d:
													if(c_a_b_c_d_e.tag == "LastName"):
														lastname = c_a_b_c_d_e.text
													elif(c_a_b_c_d_e.tag == "ForeName"):
														firstname = c_a_b_c_d_e.text
													elif(c_a_b_c_d_e.tag == "Initials"):
														initials = c_a_b_c_d_e.text
													elif(c_a_b_c_d_e.tag == "AffiliationInfo"):
														for c_a_b_c_d_e_f in c_a_b_c_d_e:
															if(c_a_b_c_d_e_f.tag == "Affiliation"):
																affiliation = c_a_b_c_d_e_f.text

												#print( lastname, firstname, initials, affiliation)''

												if exist==1:
													c.execute("INSERT INTO "+table_name2+"(pubmed_id, fore_name, "+
													"last_name, initials, affiliations) VALUES ( ?, ?, ?, ?, ?)",
													(pubmed_id, firstname, lastname, initials, affiliation))
							#Article Ended
							elif c_a_b.tag == "MedlineJournalInfo":					   
								for c_a_b_c in c_a_b:
									if(c_a_b_c.tag == "Country"):
										country_journal =  c_a_b_c.text
										#print("Country(Journal) : ", c_a_b_c.text)
							#MedlineJournalInfo ended
							elif c_a_b.tag == "KeywordList":
								for c_a_b_c in c_a_b:	
									if(c_a_b_c.tag == "Keyword"):
										Keyword.append(c_a_b_c.text)
									keyword = c_a_b_c.text
								#print("Keywords : ", Keyword)
							elif c_a_b.tag == "MeshHeadingList":

								for c_a_b_c in c_a_b:
									#Iteration over MeshHeadingList
									if c_a_b_c.tag == "MeshHeading":
										
										for c_a_b_c_d in c_a_b_c:
											if c_a_b_c_d.tag == "DescriptorName":
												Keyword.append(c_a_b_c_d.text)
								#print("MeshHeading : ", Keyword)

			#print("\n\n\n")
				if len(Keyword) > 1:
					keyword = ", ".join(Keyword)
				elif len(Keyword) == 1:
					keyword = Keyword[0]

				if exist==1:
					c.execute("INSERT INTO "+table_name1+"(pubmed_id, year,"+
						"month, date, issn, issn_type,"+
						" journal_title, iso_abbr_journal, pub_year, pub_month, pub_date, title,"+
						" medline_pg_no, doi, abstract,"+
						" country_journal, keyword) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)",
						(pubmed_id, year, month, date, issn, issn_type, journal_title, iso_abbr_journal, pub__year, pub__month, pub__date, title, medline_pg_no, doi, abstract, country_journal, keyword))
	conn.commit()
conn.close()
print("Successfualy Executed the JOB!")
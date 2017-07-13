
SELECT UUID_TASK_H, CUSTOMER_NAME, AGREEMENT_NO, BRANCH_NAME,   
ASSIGN_DATE, SUBMIT_DATE, FULL_NAME, STATUS_TASK_DESC,   
SEND_DATE, FLAG FROM (   
	SELECT a.UUID_TASK_H, a.CUSTOMER_NAME, a.AGREEMENT_NO, a.BRANCH_NAME,   
	a.ASSIGN_DATE, a.SUBMIT_DATE, a.FULL_NAME, a.STATUS_TASK_DESC,   
	SEND_DATE, FLAG, ROW_NUMBER() OVER(ORDER BY rownum) AS recnum FROM (   
		SELECT b.UUID_TASK_H, b.CUSTOMER_NAME, b.AGREEMENT_NO, b.BRANCH_NAME,    
		b.ASSIGN_DATE, b.SUBMIT_DATE, b.FULL_NAME, b.STATUS_TASK_DESC,    
		b.SEND_DATE, b.FLAG, '5D' as FLAGORDER,    
		ROW_NUMBER() OVER ( 
			ORDER BY WHEN FLAGORDER = '1D' THEN b.CUSTOMER_NAME
					 WHEN FLAGORDER = '2D' THEN b.AGREEMENT_NO
					 WHEN FLAGORDER = '3D' THEN b.BRANCH_NAME
					 WHEN FLAGORDER = '4D' THEN b.ASSIGN_DATE
					 WHEN FLAGORDER = '5D' THEN b.SUBMIT_DATE
					 WHEN FLAGORDER = '6D' THEN b.FULL_NAME
					 WHEN FLAGORDER = '7D' THEN b.STATUS_TASK_DESC
					 WHEN FLAGORDER = '8D' THEN b.send_date
					 ELSE NULL END DESC
			) as rownum FROM (    
			SELECT trth.UUID_TASK_H,    
				isnull(trth.CUSTOMER_NAME,'-') as CUSTOMER_NAME,    
				isnull(trth.AGREEMENT_NO,'-') as AGREEMENT_NO,    
				isnull(msb.BRANCH_NAME,'-') as BRANCH_NAME,    
				trth.ASSIGN_DATE as ASSIGN_DATE,    
				trth.SUBMIT_DATE as SUBMIT_DATE,    
				isnull(ammsu.FULL_NAME,'-') as FULL_NAME,    
				isnull(msst.STATUS_TASK_DESC,'-') as STATUS_TASK_DESC,    
				trth.send_date as SEND_DATE,    
				ammsu.UUID_MS_SUBSYSTEM,    
				trth.UUID_BRANCH as UUID_BRANCH,    
				trth.UUID_STATUS_TASK as UUID_STATUS_TASK,    
				'1' as FLAG		    		
				FROM TR_TASK_H trth    
				left join MS_STATUSTASK msst on trth.UUID_STATUS_TASK = msst.UUID_STATUS_TASK    
				left join AM_MSUSER ammsu on ammsu.UUID_MS_USER = trth.UUID_MS_USER    
				join (
					SELECT keyValue as UUID_BRANCH, BRANCH_NAME 
					FROM dbo.getCabangByLogin('748ACAA8-50D2-4F38-B511-9D4C01BB80E4') msb on trth.UUID_BRANCH = msb.UUID_BRANCH    
					union all    
					SELECT trth.UUID_TASK_H,    
						isnull(trth.CUSTOMER_NAME,'-') as CUSTOMER_NAME,    
						isnull(trth.AGREEMENT_NO,'-') as AGREEMENT_NO,    
						isnull(msb.BRANCH_NAME,'-') as BRANCH_NAME,    
						trth.ASSIGN_DATE as ASSIGN_DATE,    
						trth.SUBMIT_DATE as SUBMIT_DATE,    
						isnull(ammsu.FULL_NAME,'-') as FULL_NAME,    
						isnull(msst.STATUS_TASK_DESC,'-') as STATUS_TASK_DESC,    
						trth.send_date as SEND_DATE,    
						ammsu.UUID_MS_SUBSYSTEM,    
						trth.UUID_BRANCH as UUID_BRANCH,    
						trth.UUID_STATUS_TASK as UUID_STATUS_TASK,    
						'2' as FLAG	    			
					FROM final_TR_TASK_H trth    
						left join MS_STATUSTASK msst on trth.UUID_STATUS_TASK = msst.UUID_STATUS_TASK    
						left join AM_MSUSER ammsu on ammsu.UUID_MS_USER = trth.UUID_MS_USER    
						join (
							SELECT keyValue as UUID_BRANCH, BRANCH_NAME FROM dbo.getCabangByLogin('748ACAA8-50D2-4F38-B511-9D4C01BB80E4') msb on      
							trth.UUID_BRANCH = msb.UUID_BRANCH    
							) b
				where 1=1
				
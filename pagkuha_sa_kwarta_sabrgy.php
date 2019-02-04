SELECT ((SUM(amount_paid) - SUM(monthly_loan_repayment) + SUM(penalty_paid)) - SUM(rebate)) AS loan_earnings, TIMESTAMPDIFF(DAY,CURDATE(),'2019-01-04') AS end_quarter
FROM borrower_monthly_repayments
WHERE amount_paid > monthly_loan_repayment
AND is_commission_counted = 0
AND registered_brgy_id = 1
AND TIMESTAMPDIFF(DAY,CURDATE(),'2019-01-04') < 1
//kung na abot na sa date


SELECT SUM(monthly_return) AS investment_earnings
FROM lender_monthly_returns
WHERE is_commission_counted = 0
ANd is_returned = 1
AND registered_brgy_id = 1

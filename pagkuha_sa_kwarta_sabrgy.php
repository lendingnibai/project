SELECT (SUM(amount_paid) - SUM(monthly_loan_repayment) + SUM(penalty_paid) - SUM(rebate)) AS from_bmr_earnings
FROM borrower_monthly_repayments
WHERE amount_paid > monthly_loan_repayment
AND is_commission_collected = 0
AND registered_brgy_id = 1


SELECT SUM(monthly_return) AS from_lr_earnings
FROM lender_monthly_returns
WHERE is_commission_collected = 0
AND registered_brgy_id = 1

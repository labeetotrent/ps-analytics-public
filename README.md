ps-analytics-public
===================

Used by Pluralsight Data Analytics team for all things related to the management and maintenance of a Tableau Server infrastructure. Scripts/Code includes, but is not limited to: 

- Moving workbooks / datasources from different sites and/or environments
- Changing formulas/fields in workbooks datasources and republishing to server
- Updating custom sql in datasources automatically
- Triggering extract refreshes
- Archiving older workbooks/datasources and storing them on Amazon S3

Example: 
The 'server-msg.txt' is used post server messages on Tableau. To post message simply uncomment the <span> tag inside the file linked below and add whatever message you like. This accepts HTML so you can use styling info in the tag also.

** Commented out example (will not show)

\<!-- \<span style="font-size:26px; color:#F16621;">Testing...\</span> \-->

** Uncommented example (will show)

\<span style="font-size:26px; color:#F16621;">Server Maintenance Tonight from 6-8p PST\</span>


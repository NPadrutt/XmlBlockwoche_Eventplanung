<?xml version="1.0" encoding="UTF-8"?>
<xsl:transform xmlns:xsl="http://www.w3.org/1999/XSL/Transform" xmlns:fo="http://www.w3.org/1999/XSL/Format" version="1.0">
    <xsl:param name="eventIdParam">
        <!-- Content:template -->
    </xsl:param>
    
    <xsl:template match="applications">
        <fo:root>
            <fo:layout-master-set>
                    <fo:simple-page-master master-name="application_confirmation" page-height="29.7cm" page-width="21cm" margin-top="1cm" margin-bottom="2cm" margin-left="2.5cm" margin-right="2.5cm">
                            <fo:region-body margin-top="1cm"/>
                            <fo:region-before extent="2cm"/>
                            <fo:region-after extent="3cm"/>
                    </fo:simple-page-master>
            </fo:layout-master-set>
            <fo:page-sequence master-reference="application_confirmation">
                    <fo:static-content flow-name="xsl-region-before">
                            <fo:block text-align="center" font-size="8pt">																								James Bond Movie Price List  /  Page																								
                                    <fo:page-number/>
                            </fo:block>
                    </fo:static-content>
                    <fo:flow flow-name="xsl-region-body">
                            <fo:block font-size="19pt" font-family="sans-serif" line-height="24pt" space-after.optimum="20pt" background-color="blue" color="white" text-align="center" padding-top="5pt" padding-bottom="5pt">James Bond DVD Price List</fo:block>
                            <!-- For each movie ...  -->
                            <xsl:apply-templates select="/applications/application[@event-ref=$eventIdParam]" />
                    </fo:flow>
            </fo:page-sequence>
        </fo:root>
    </xsl:template>
    
    <xsl:template match="application">
        
        <fo:block break-after="page">
            
            <xsl:apply-templates select="/participants/participant[@id=participant-ref]"/>
            
        </fo:block>        
    </xsl:template>
    
    <xsl:template match="participant">
        <fo:block>
            <!--
            <fo:block linefeed-treatment="preserve">
                <xsl:text>&#xA;</xsl:text>    
            </fo:block>
            -- >
            
            <xsl:value-of select="prename"/>  
                <xsl:text> </xsl:text>
            <xsl:value-of select="name"/>  
            <fo:block/>
            <xsl:value-of select="street"/>
            <fo:block/>
            <fo:block  white-space-collapse="false">
                <xsl:value-of select="zipcode"/>
                <xsl:text> </xsl:text>
                <xsl:value-of select="city"/>
            </fo:block>
            <xsl:value-of select="phonenumber"/>
            <fo:block/>
            <xsl:value-of select="customer/mail"/>
            <fo:block linefeed-treatment="preserve" text-align="right" font-weight="900">
                <!-- <xsl:text>&#xA;</xsl:text> -->
                <xsl:text>Bestätigungsdatum: <xsl:value-of  select="current-dateTime()"/>
            </fo:block>
            <fo:block linefeed-treatment="preserve">  
                <xsl:text>&#xA;</xsl:text>
                <fo:block font-size="14pt" font-weight="900">Anmeldebestätigung</fo:block>
                <xsl:text>&#xA;</xsl:text>
                
                
            </fo:block>

        </fo:block>
    </xsl:template>
</xsl:transform>



<pre><code><span class="token keyword">class</span> <span class="token class-name">Designer</span> <span class="token keyword">extends</span> <span class="token class-name">FrontEndDeveloper</span> {
    <span class="token method">constructor</span>() {
        <span class="token keyword">super</span>();
        <span class="token keyword">this</span>.<span class="token property">focus</span> = [<span class="token string">'UX'</span>, <span class="token string">'UI'</span>, <span class="token string">'ScalableSystems'</span>];
    }
    <span class="token method">design</span>() {
        <span class="token keyword">this</span>.<span class="token method">ensure</span>({ <span class="token property">technicalFeasibility</span>: <span class="token boolean">true</span> });
        <span class="token keyword">return</span> { <span="token property">components</span>: <span class="token string">'well-documented'</span>, <span class="token property">collaboration</span>: <span class="token string">'frictionless'</span> };
    }
}</code></pre>